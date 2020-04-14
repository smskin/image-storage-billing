@extends('layouts.app')

@section('js')
    {!! dataTableJs($table) !!}
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Проекты</div>
            <div class="card-body">
                <a href="{{ action('Web\ProjectController@create') }}" class="btn btn-primary mb-2">+ Создать проект</a>
                {!! dataTable($table) !!}
            </div>
        </div>
    </div>
@endsection
