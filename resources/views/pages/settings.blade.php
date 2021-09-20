@extends('layouts.main-layout')

@section('title', 'About | Настройки')

@section('content')

<script src="/static/js/settings.js"></script>

@include('includes.header')

<div class="container" style="max-width: 960px;">
    <div class="row justify-content-center">
        <div id="settings" class="col-md-9 mt-4">
            <div class="border rounded-1 bg-white shadow">
                <form id="settings-form" class="p-3">
                    <div class="d-flex">
                        <img id="avatar-preview" class="center img-responsive rounded border" style="width: 200px; height: 200px" src="{{$current_user['avatar']}}" alt="Аватар">
                        <div class="w-100" style="margin-left: 16px">
                            <input id="settings-name" readonly class="form-control mb-2" type="text" name="name" placeholder="Новое имя пользователя">
                            <input id="settings-email" readonly class="form-control mb-2" type="email" name="email" placeholder="Почта">
                            <input id="settings-password" readonly class="form-control mb-2" type="password" name="password" placeholder="Смена пароля">
                            <input id="settings-password-confirm" readonly class="form-control mb-2" type="password" name="password-confirm" placeholder="Подтверждение пароля">
                            <input id="settings-avatar" class="form-control" type="file" accept="image/*" name="avatar">
                        </div>
                    </div>
                    <div class="d-flex  mt-3">
                        <button id="edit-button" type="submit" class="btn btn-primary">Сохранить</button>
                        <p class="text-danger settings-error" style="margin-left: 16px"></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection