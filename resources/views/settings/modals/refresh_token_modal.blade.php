<div class="modal fade" id="refresh_token_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form method="POST" action="{{ action('WebApi\UserController@refreshToken',[$user->id]) }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Перевыпуск API ключа</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    Вы действительно хотите перевыпустить API ключ?<br />
                    Старый ключ будет отозван.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
                <button type="submit" class="btn btn-danger">Да</button>
            </div>
        </form>
    </div>
</div>
