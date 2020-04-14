@extends('layouts.projects')

@section('page-content')
    <div class="card">
        <div class="card-header">Проект: {{ $project->name }}. Статистика.</div>
        <div class="card-body">
            {!! Form::text('count','Количество файлов',$stat->count)->readonly() !!}
            {!! Form::text('size','Общий размер файлов',$stat->size)->readonly() !!}
        </div>
    </div>
@endsection
