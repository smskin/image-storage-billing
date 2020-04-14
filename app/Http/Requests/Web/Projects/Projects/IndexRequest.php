<?php

namespace App\Http\Requests\Web\Projects\Projects;

use Exception;
use Illuminate\Foundation\Http\FormRequest;
use stdClass;
use Yajra\DataTables\DataTables;

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
     * @return array
     * @throws Exception
     */
    final public function getViewContent(): array
    {
        return [
            'table'=>$this->getTable()
        ];
    }

    /**
     * @return object
     * @throws Exception
     */
    private function getTable(): stdClass
    {
        $builder = (new DataTables())->getHtmlBuilder();
        $table = $builder
            ->orders([[0,'asc']])
            ->lengthMenu([
                [25, 50, 100, -1],
                [25, 50, 100, 'All']
            ])
            ->pageLength(25)
            ->ajax(action('WebApi\\ProjectController@dataTable', auth()->user()->id))
            ->columns([
                [
                    'data' => 'id',
                    'name' => 'id',
                    'title' => 'ID',
                    'width' => '50px'
                ],
                [
                    'data' => 'name',
                    'name' => 'name',
                    'title' => 'Название'
                ],
                [
                    'data' => 'toolbox',
                    'orderable'=>false,
                    'searchable'=>false,
                    'title'=>'',
                    'width'=>'10px'
                ]
            ]);
        return (object)[
            'html'=>$table->table([
                'class'=>'table table-striped- table-bordered table-hover table-checkable responsive no-wrap'
            ]),
            'config'=>$table->generateJson()
        ];
    }
}
