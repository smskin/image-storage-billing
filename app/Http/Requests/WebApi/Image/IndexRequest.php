<?php

namespace App\Http\Requests\WebApi\Image;

use App\DBContext\DBContextImage;
use App\DBContext\DBContextProject;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Http\FormRequest;
use SMSkin\ImageStorage\Services\ImageService\Exceptions\ValidationException;
use SMSkin\ImageStorage\Services\ImageService\Models\ImageModel;
use SMSkin\ImageStorage\Services\ImageService\Service as ImageService;
use stdClass;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    /**
     * @param DBContextProject $project
     * @return stdClass
     * @throws BindingResolutionException
     * @throws ValidationException
     */
    final public function execute(DBContextProject $project): stdClass
    {
        $limit = 20;
        return (object)[
            'pages'=>$this->getPagesCount($project,$limit),
            'files'=>$this->getFiles($project,$limit)
        ];
    }

    private function getPagesCount(DBContextProject $project, int $limit): int
    {
        $count = DBContextImage::whereProjectId($project->id)->count(['id']);
        return (int) ceil ($count / $limit);
    }

    /**
     * @param DBContextProject $project
     * @param int $limit
     * @return array
     * @throws BindingResolutionException
     * @throws ValidationException
     */
    private function getFiles(DBContextProject $project, int $limit): array
    {
        $page = (int) $this->input('page',1);
        $offset = $page*$limit-$limit;
        $images = DBContextImage::whereProjectId($project->id)
            ->limit($limit)
            ->offset($offset)
            ->orderBy('id','desc')
            ->get();
        $result = [];
        $service = $this->getImageService();
        foreach ($images as $key => $image){
            $img = $service
                ->make($image->public_url)
                ->crop(ImageModel::CROP_TYPE_CENTER)
                ->setWidth(200)
                ->setHeight(200)
                ->setQualityLevel(90);

            $result[] = (object)[
                'key'=>$key,
                'id'=>$image->id,
                'pic'=>(object)[
                    'webp'=>$img->setFormat(ImageModel::FORMAT_WEBP)->getUrl(),
                    'jpg'=>$img->setFormat(ImageModel::FORMAT_JPG)->getUrl()
                ],
                'size'=>convertToReadableSize($image->file_size)
            ];
        }
        return $result;
    }

    /**
     * @return ImageService
     * @throws BindingResolutionException
     */
    private function getImageService(): ImageService
    {
        return app()->make(ImageService::class);
    }
}
