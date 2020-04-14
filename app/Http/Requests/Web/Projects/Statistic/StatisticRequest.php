<?php

namespace App\Http\Requests\Web\Projects\Statistic;

use App\DBContext\DBContextImage;
use App\DBContext\DBContextProject;
use Illuminate\Foundation\Http\FormRequest;
use stdClass;

class StatisticRequest extends FormRequest
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

    final public function getViewContent(DBContextProject $project): array
    {
        return [
            'project'=>$project,
            'stat'=>$this->getStatistic($project)
        ];
    }

    private function getStatistic(DBContextProject $project): stdClass
    {
        $count = DBContextImage::whereProjectId($project->id)->count(['id']);
        $size = DBContextImage::whereProjectId($project->id)->sum('file_size');

        return (object)[
            'count'=>$count,
            'size'=>convertToReadableSize($size)
        ];
    }
}
