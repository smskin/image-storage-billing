<?php

namespace App\Http\Controllers\Web;

use App\DBContext\DBContextImage;
use App\DBContext\DBContextProject;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Projects\Projects\IndexRequest;
use App\Http\Requests\Web\Projects\Statistic\StatisticRequest;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\View\View;
use Lavary\Menu\Builder;
use Menu;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function generateMenu(DBContextProject $project): void
    {
        Menu::make('projectsNav',function(Builder $menu) use ($project) {
            $menu->add('Проект',action('Web\ProjectController@show',[$project->id]));
            $menu->add('Приватность',action('Web\ProjectController@security',[$project->id]));
            $menu->add('Файловый менеджер',action('Web\ProjectController@fileManager',[$project->id]));
            $menu->add('Статистика',action('Web\ProjectController@statistic',[$project->id]));
        });
    }

    /**
     * @param IndexRequest $request
     * @return View
     * @throws Exception
     */
    final public function index(IndexRequest $request): View
    {
        $user = auth()->user();
        $this->authorize('viewAny',[DBContextProject::class, $user]);

        return view('projects.project.index',$request->getViewContent());
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    final public function create(): View
    {
        $user = auth()->user();
        $this->authorize('viewAny',[DBContextProject::class, $user]);

        return view('projects.project.create',[
            'user'=>$user
        ]);
    }

    /**
     * @param DBContextProject $project
     * @return View
     * @throws AuthorizationException
     */
    final public function show(DBContextProject $project): View
    {
        $this->authorize('view',$project);
        $this->generateMenu($project);

        return view('projects.project.show',[
            'project'=>$project
        ]);
    }

    /**
     * @param DBContextProject $project
     * @return View
     * @throws AuthorizationException
     */
    final public function edit(DBContextProject $project): View
    {
        $this->authorize('update',$project);
        $this->generateMenu($project);

        return view('projects.project.edit',[
            'project'=>$project
        ]);
    }

    /**
     * @param DBContextProject $project
     * @return View
     * @throws AuthorizationException
     */
    final public function fileManager(DBContextProject $project): View
    {
        $this->authorize('viewAny',[DBContextImage::class, $project]);
        $this->generateMenu($project);

        return view('projects.file-manager.index',[
            'project'=>$project,
            'pageData'=>json_encode((object)[
                'projectId'=>$project->id
            ])
        ]);
    }

    /**
     * @param DBContextProject $project
     * @return View
     * @throws AuthorizationException
     */
    final public function security(DBContextProject $project): View
    {
        $this->authorize('view',$project);
        $this->generateMenu($project);

        return view('projects.security.index',[
            'project'=>$project
        ]);
    }

    /**
     * @param StatisticRequest $request
     * @param DBContextProject $project
     * @return View
     * @throws AuthorizationException
     */
    final public function statistic(StatisticRequest $request, DBContextProject $project): View
    {
        $this->authorize('view',$project);
        $this->generateMenu($project);

        return view('projects.statistic.index',$request->getViewContent($project));
    }
}
