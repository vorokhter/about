@extends('layouts.main-layout')

@section('title', 'Авторизация')

@section('content')

<script>
    $(document).ready(function() {
        const loginForm = $("#login-form");
        const registrationForm = $("#registration-form");

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

            const loginData = new FormData();

            loginData.append('email', $('#inputLoginEmail').val());
            loginData.append('password', $('#inputLoginPassword').val());

            api.post({
                url: '/auth/login',
                body: loginData,
                onSuccess: function(data) {
                    window.location.href = '/';
                }
            })
        }

        function registration() {
            if (!registrationValidation()) return;

            const registrationData = new FormData();

            registrationData.append('name', $('#inputRegistrationName').val());
            registrationData.append('email', $('#inputRegistrationEmail').val());
            registrationData.append('password', $('#inputRegistrationPassword').val());
            registrationData.append('passwordConfirm', $('#inputRegistrationPasswordConfirm').val());

            api.post({
                url: '/auth/registration',
                body: registrationData,
                onSuccess: function(data) {
                    window.location.href = '/auth';
                }
            })
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