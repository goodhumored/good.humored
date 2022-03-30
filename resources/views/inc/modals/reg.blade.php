<div class="modal fade" tabindex="-1" role="dialog" id="regModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    
                    Регистрация
                
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('reg') }}" method="POST" class="auth_form">
                <div class="modal-body">
                    <div class="alert alert-danger d-none" role="alert">
                    </div>
                    
                        @csrf
                        <div class="mb-3">
                        <label for="name" class="form-label">Логин</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="name_hint" placeholder="Придумайте логин">
                        <small id="name_hint" class="form-text text-muted">Логин должен состоять из латинских символов, и цифр</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Почта</label>
                            <input type="email" class="form-control" name="email" placeholder="Ваша существующая почта">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Пароль</label>
                            <input type="password" class="form-control" name="password" placeholder="Придумайте пароль">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Регистрация</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                </div>
            </form>
        </div>
    </div>
</div>