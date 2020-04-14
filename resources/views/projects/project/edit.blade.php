@extends('layouts.projects')

@section('page-content')
    <div class="card">
        <div class="card-header">Проект: {{ $project->name }}</div>
        <div class="card-body">
            <form method="POST" action="{{ action('WebApi\ProjectController@update',[$project->id]) }}">
                {!! Form::hidden('_method','PUT') !!}
                @csrf
                {!! Form::text('name', 'Название', $project->name) !!}
                <a href="{{ action('Web\ProjectController@show',[$project->id]) }}" class="btn btn-outline"><i class="fa fa-arrow-left"></i> Назад</a>
                {!! Form::submit('Сохранить изменения') !!}
            </form>
        </div>
    </div>
@endsection
