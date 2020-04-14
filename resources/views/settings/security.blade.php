@extends('layouts.settings')

@section('modals')
    @include('settings.modals.refresh_token_modal')
@endsection

@section('page-content')
    <div class="card mb-2">
        <div class="card-header">Change password</div>
        <div class="card-body">
            <form method="POST" action="{{ action('WebApi\UserController@refreshToken',[$user->id]) }}">
                @csrf
                {!! Form::text('password', 'Password') !!}
                {!! Form::text('password_confirmation', 'Confirm password') !!}
                {!! Form::submit('Update password') !!}
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Api token</div>
        <div class="card-body">
            <div class="form">
                <?php $message = Session::get('api-token') ?>
                {!! Form::text('api_token', 'Api token', $message ? $message : 'Токен виден только при генерации')->readonly() !!}
                <button class="btn btn-danger" data-toggle="modal" data-target="#refresh_token_modal">Refresh token</button>
            </div>
        </div>
    </div>
@endsection
