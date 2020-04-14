<?php

namespace App\Http\Controllers\WebApi;

use App\DBContext\DBContextImage;
use App\DBContext\DBContextProject;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebApi\Image\IndexRequest;
use App\Services\ImageService\Service as ImageService;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use SMSkin\ImageStorage\Services\ImageService\Exceptions\ValidationException;

class ImageController extends Controller
{
    /**
     * @var ImageService
     */
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->middleware('auth');
        $this->imageService = $imageService;
    }

    /**
     * @param IndexRequest $request
     * @param DBContextProject $project
     * @return JsonResponse
     * @throws AuthorizationException
     * @throws BindingResolutionException
     * @throws ValidationException
     */
    final public function index(IndexRequest $request, DBContextProject $project): JsonResponse
    {
        $this->authorize('viewAny', [DBContextImage::class, $project]);

        return response()->json($request->execute($project));
    }

    /**
     * @param Request $request
     * @param DBContextProject $project
     * @return JsonResponse
     * @throws BindingResolutionException
     * @throws AuthorizationException
     */
    final public function store(Request $request, DBContextProject $project): JsonResponse
    {
        $this->authorize('create', [DBContextImage::class, $project]);

        $request->validate([
            'file'=>'required|image'
        ]);

        $this->imageService->upload(
            $project,
            $request->file('file')
        );

        return response()->json((object)[
            'result'=>true
        ]);
    }

    /**
     * @param DBContextImage $image
     * @return JsonResponse
     * @throws Exception
     */
    final public function destroy(DBContextImage $image): JsonResponse
    {
        $this->authorize('delete', $image);

        $this->imageService->delete($image);

        return response()->json((object)[
            'result'=>true
        ]);
    }
}
