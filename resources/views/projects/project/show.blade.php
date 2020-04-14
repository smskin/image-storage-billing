@extends('layouts.projects')

@section('modals')
    @include('projects.project.modals.delete_modal')
@endsection

@section('page-content')
    <div class="card">
        <div class="card-header">Проект: {{ $project->name }}</div>
        <div class="card-body">
            <div class="form">
                {!! Form::text('uid', 'UID',$project->uid)->readonly() !!}
                {!! Form::text('name', 'Название', $project->name)->readonly() !!}
                <a href="{{ action('Web\ProjectController@index') }}" class="btn btn-outline"><i class="fa fa-arrow-left"></i> Назад</a>
                <a href="{{ action('Web\ProjectController@edit',[$project->id]) }}" class="btn btn-primary">Редактировать</a>
                <div class="float-right">
                    <button class="btn btn-danger" data-toggle="modal" data-target="#delete_modal">Удалить</button>
                </div>
            </div>
        </div>
    </div>
@endsection
