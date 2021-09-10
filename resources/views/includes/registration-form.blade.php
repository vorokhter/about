<form id="registration-form" style="display:none">
    <p class="fs-3">Регистрация</p>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="inputRegistrationName" name="name" placeholder="Имя пользователя">
        <label for="innputName" class="form-label">Имя пользователя</label>
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="inputRegistrationEmail" name="email" placeholder="Почта">
        <label for="InputEmail" class="form-label">Почта</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="inputRegistrationPassword" name="password" placeholder="Пароль">
        <label for="inputPassword" class="form-label">Пароль</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="inputRegistrationPasswordConfirm" name="passwordConfirm" placeholder="Подтверждение пароля">
        <label for="inputPasswordConfirm" class="form-label">Подтверждение пароля</label>
    </div>
    <button id="registrate-button" type="submit" class="btn btn-primary">Зарегистрироваться</button>
    <button id="login-button" class="btn btn-link">Авторизация</button>
</form>