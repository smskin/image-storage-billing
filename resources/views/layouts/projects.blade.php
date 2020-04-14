@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                <ul class="navbar-nav ml-auto">
                    @include(config('laravel-menu.views.bootstrap-items'), ['items' => $projectsNav->roots()])
                </ul>
            </div>
            <div class="col-10">
                @yield('page-content')
            </div>
        </div>
    </div>
@endsection
