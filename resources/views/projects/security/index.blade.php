@extends('layouts.projects')

@section('modals')
    @include('projects.security.modals.refresh_token_modal')
@endsection

@section('page-content')
    <div class="card">
        <div class="card-header">Проект: {{ $project->name }}. Приватность.</div>
        <div class="card-body">
            @if (Session::has('flash'))
                <div class="alert alert-success" role="alert">{{ Session::get('flash') }}</div>
            @endif
            <div class="form">
                <?php $message = Session::get('api-token') ?>
                {!! Form::text('api_token', 'Api token', $message ? $message : 'Токен виден только при генерации')->readonly() !!}
                <button class="btn btn-danger" data-toggle="modal" data-target="#refresh_token_modal">Перевыпустить ключ</button>
            </div>
        </div>
    </div>
@endsection
