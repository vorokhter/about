$(document).ready(function () {
    const loginForm = $("#login-form");
    const registrForm = $("#registration-form");

    const loginEmail = $("#login-email");
    const loginPass = $("#login-password");

    const registrName = $("#registration-name");
    const registrEmail = $("#registration-email");
    const registrPass = $("#registration-password");
    const registrPassConf = $("#registration-password-confirm");

    loginForm.on("submit", function (event) {
        event.preventDefault();
        login();
    });

    registrForm.on("submit", function (event) {
        event.preventDefault();
        registration();
    });

    $("#registration-button").on("click", function (event) {
        event.preventDefault();
        $(".auth-error").text("");
        loginForm.hide();
        registrForm.show();
    });

    $("#login-button").on("click", function (event) {
        event.preventDefault();
        $(".auth-error").text("");
        registrForm.hide();
        loginForm.show();
    });

    function loginValidation() {
        let status = true;

        if (loginEmail.val().length <= 0) status = false;
        if (loginPass.val().length <= 0) status = false;

        if (!status) $(".auth-error").text("Заполните пустые поля");
        return status;
    }

    function registrValidation() {
        let status = true;

        if (registrName.val().length <= 0) status = false;
        if (registrEmail.val().length <= 0) status = false;
        if (registrPass.val().length <= 0) status = false;
        if (registrPassConf.val().length <= 0) status = false;

        if (!status) $(".auth-error").text("Заполните пустые поля");
        return status;
    }

    function login() {
        if (!loginValidation()) return;

        const loginData = new FormData();

        loginData.append("email", loginEmail.val());
        loginData.append("password", loginPass.val());

        api.post({
            url: "/auth/login",
            body: loginData,
        })
            .then((result) => (window.location.href = "/"))
            .catch((error) => {
                $(".auth-error").text(error.responseJSON);
            });
    }

    function registration() {
        if (!registrValidation()) return;

        const registrationData = new FormData();

        registrationData.append("name", registrName.val());
        registrationData.append("email", registrEmail.val());
        registrationData.append("password", registrPass.val());
        registrationData.append("passwordConfirm", registrPassConf.val());

        api.post({
            url: "/auth/registration",
            body: registrationData,
        })
            .then((result) => (window.location.href = "/auth"))
            .catch((error) => {
                $(".auth-error").text(error.responseJSON);
            });
    }
});
