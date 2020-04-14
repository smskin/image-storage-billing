<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form method="POST" action="{{ action('WebApi\ProjectController@destroy',[$project->id]) }}" class="modal-content">
            @csrf
            <input type="hidden" name="_method" value="DELETE" />
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Удаление объекта</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    Вы действительно хотите <strong><font color="red">удалить</font></strong> данный проект?<br />
                    Файлы проекта будут удалены безвозвратно.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
                <button type="submit" class="btn btn-danger">Да</button>
            </div>
        </form>
    </div>
</div>
