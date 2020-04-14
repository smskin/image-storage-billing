@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Создание проекта</div>
            <div class="card-body">
                <form method="POST" action="{{ action('WebApi\ProjectController@store', [$user->id]) }}">
                    @csrf
                    {!! Form::text('name', 'Название проекта') !!}
                    {!! Form::submit('Создать проект') !!}
                </form>
            </div>
        </div>
    </div>
@endsection
