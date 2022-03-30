<div class="modal fade" tabindex="-1" role="dialog" id="authModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Вход</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('auth') }}" method="POST" class="auth_form">
                <div class="modal-body">
                    <div class="alert alert-danger d-none" role="alert">
                    </div>

                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Почта</label>
                            <input type="email" class="form-control" name="email" placeholder="Почта">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Пароль</label>
                            <input type="password" class="form-control" name="password" placeholder="Пароль">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Вход</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                </div>
            </form>
        </div>
    </div>
</div>