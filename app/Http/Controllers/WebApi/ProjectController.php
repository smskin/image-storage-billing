<?php

namespace App\Http\Controllers\WebApi;

use App\DBContext\DBContextProject;
use App\DBContext\DBContextUser;
use App\Http\Controllers\Controller;
use App\Services\ProjectService\Service as ProjectService;
use DataTables;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Session;
use Throwable;

class ProjectController extends Controller
{
    /**
     * @var ProjectService
     */
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->middleware('auth');
        $this->projectService = $projectService;
    }

    /**
     * @param DBContextUser $user
     * @return JsonResponse
     * @throws Exception
     */
    final public function dataTable(DBContextUser $user): JsonResponse
    {
        $this->authorize('viewAny', [DBContextProject::class, $user]);

        $query = DBContextProject::whereUserId($user->id);

        return DataTables::of($query)
            ->addColumn('toolbox',function(DBContextProject $data){
                $url = action('Web\ProjectController@show',[$data->id]);
                return '<a href="'.$url.'"><i class="fa fa-eye"></i></a>';
            })
            ->rawColumns(['toolbox'])
            ->toJson();
    }

    /**
     * @param Request $request
     * @param DBContextUser $user
     * @return RedirectResponse
     * @throws Exception
     * @throws Throwable
     */
    final public function store(Request $request, DBContextUser $user): RedirectResponse
    {
        $this->authorize('create', [DBContextProject::class, $user]);

        $request->validate([
            'name'=>'required'
        ]);

        $project = $this->projectService->create(
            $user,
            $request->input('name')
        );

        return response()->redirectTo(action('Web\ProjectController@show',[$project->id]));
    }

    /**
     * @param Request $request
     * @param DBContextProject $project
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    final public function update(Request $request, DBContextProject $project): RedirectResponse
    {
        $this->authorize('update', $project);

        $request->validate([
            'name'=>'required'
        ]);

        $this->projectService->update(
            $project,
            $request->input('name')
        );

        return redirect()->to(action('Web\ProjectController@edit',[$project->id]));
    }

    /**
     * @param DBContextProject $project
     * @return RedirectResponse
     * @throws Exception
     */
    final public function destroy(DBContextProject $project): RedirectResponse
    {
        $this->authorize('delete', $project);

        $this->projectService->delete($project);

        return redirect()->to(action('Web\ProjectController@index'));
    }

    /**
     * @param DBContextProject $project
     * @return RedirectResponse
     * @throws Exception
     */
    final public function refreshToken(DBContextProject $project): RedirectResponse
    {
        $this->authorize('update', $project);

        $token = $this->projectService->refreshApiToken($project);

        flashSuccess('Api token refreshed');
        Session::flash('api-token',$token);

        return redirect()->to(action('Web\ProjectController@security',[$project->id]));
    }
}
