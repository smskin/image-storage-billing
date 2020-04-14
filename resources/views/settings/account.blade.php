@extends('layouts.settings')

@section('page-content')
    <div class="card">
        <div class="card-header">Account information</div>
        <div class="card-body">
            <form method="POST" action="{{ action('WebApi\UserController@update', [$user->id]) }}">
                @csrf
                {!! Form::hidden('_method','PUT') !!}
                {!! Form::text('uid', 'UID', $user->uid)->readonly() !!}
                {!! Form::text('name', 'Name', $user->name) !!}
                {!! Form::text('email', 'E-mail', $user->email) !!}
                {!! Form::submit('Update information') !!}
            </form>
        </div>
    </div>
@endsection
