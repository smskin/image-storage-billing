@extends('layouts.projects')

@section('js')
    <script type="text/javascript">
        window.application.pageData = {!! $pageData !!};
    </script>
    <script type="text/javascript" src="{{ mix('/js/pages/projects/file-manager.js','assets') }}"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ mix('/css/pages/projects/file-manager.css','assets') }}" />
@endsection

@section('page-content')
    <div id="file-manager" class="card">
        <div class="card-header">Проект: {{ $project->name }}. Файловый менеджер.</div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <upload-component
                        :project_id = "project_id"
                        v-on:file-uploading="onFileUploading"
                        v-on:file-uploaded="onFileUploaded"
                    ></upload-component>
                </div>
                <div class="col-9">
                    <status-component
                        :shown="message.shown"
                        :text="message.text"
                    ></status-component>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <file-component
                        v-for="file in files"
                        :project_id="project_id"
                        :file="file"
                        :key="file.key"
                        v-on:file-deleting="onFileDeleting"
                        v-on:file-deleted="onFileDeleted"
                    ></file-component>
                </div>
            </div>
            <div v-if="pages > 1" class="row">
                <div class="col-12">
                    <pagination-component
                        v-on:change-page="onChangePage"
                        v-model="page" :count="pages"></pagination-component>
                </div>
            </div>
        </div>
    </div>
@endsection
