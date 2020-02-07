<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <form action="/admin/auth" method="POST">
                    <div class="border p-5">
                        <div class="form-group">
                            <input type="text" placeholder="Логин" class="form-control" name="login" id="auth-login" required>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Пароль" class="form-control" name="password" id="auth-password" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100" name="auth">Войти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>