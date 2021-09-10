@extends('layouts.main-layout')

@section('title', 'Авторизация')

@section('content')

<script>
    $(document).ready(function() {
        var loginForm = $("#login-form");
        var registrationForm = $("#registration-form");

        loginForm.on("submit", function(event) {
            event.preventDefault();
            login();

        });
        registrationForm.on("submit", function(event) {
            event.preventDefault();
            registration();
        });

        $("#registration-button").on("click", function(event) {
            event.preventDefault();
            loginForm.hide();
            registrationForm.show();
        });
        $("#login-button").on("click", function(event) {
            event.preventDefault();
            registrationForm.hide();
            loginForm.show();
        });


        function loginValidation() {
            if ($('#inputLoginEmail').val().length <= 0) {
                //showError('Ошибка создания альбома', 'Название альбома - обязтаельное поле!');
                return false;
            }
            if ($('#inputLoginPassword').val().length <= 0) {
                //showError('Ошибка создания альбома', 'Название альбома - обязтаельное поле!');
                return false;
            }
            return true;
        }

        function registrationValidation() {
            if ($('#inputRegistrationName').val().length <= 0) {
                //showError('Ошибка создания альбома', 'Название альбома - обязтаельное поле!');
                return false;
            }
            if ($('#inputRegistrationEmail').val().length <= 0) {
                //showError('Ошибка создания альбома', 'Название альбома - обязтаельное поле!');
                return false;
            }
            if ($('#inputRegistrationPassword').val().length <= 0) {
                //showError('Ошибка создания альбома', 'Название альбома - обязтаельное поле!');
                return false;
            }
            if ($('#inputRegistrationPasswordConfirm').val().length <= 0) {
                //showError('Ошибка создания альбома', 'Название альбома - обязтаельное поле!');
                return false;
            }
            return true;
        }

        function login() {
            if (!loginValidation()) return;

            var loginData = new FormData();

            loginData.append('email', $('#inputLoginEmail').val());
            loginData.append('password', $('#inputLoginPassword').val());

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST', // отправляем в POST формате, можно GET
                url: '/auth/login', // путь дo обработчика
                dataType: 'json', // ответ ждём в json формате
                data: loginData, // данные для отправки
                enctype: 'multipart/form-data',
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function(data) { // событие в случае удачного запроса
                    window.location.href = '/';
                },
                complete: function(data) {
                    //console.log("что то сделало!!!")
                }
            });
        }

        function registration() {
            if (!registrationValidation()) return;

            var registrationData = new FormData();

            registrationData.append('name', $('#inputRegistrationName').val());
            registrationData.append('email', $('#inputRegistrationEmail').val());
            registrationData.append('password', $('#inputRegistrationPassword').val());
            registrationData.append('passwordConfirm', $('#inputRegistrationPasswordConfirm').val());

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST', // отправляем в POST формате, можно GET
                url: '/auth/registration', // путь дo обработчика
                dataType: 'json', // ответ ждём в json формате
                data: registrationData, // данные для отправки
                enctype: 'multipart/form-data',
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function(data) { // событие в случае удачного запроса
                    window.location.href = '/auth';
                },
                complete: function(data) {
                    //console.log("что то сделало!!!")
                }
            });
        }

    });
</script>

<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="card bg-light" style="width: 320px;">
        <div class="card-body">
            @include('includes.login-form')
            @include('includes.registration-form')
        </div>
    </div>
</div>

@endsection