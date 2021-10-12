@extends('layouts.main-layout')

@section('title', 'About | Настройки')

@section('content')

<script src="/static/js/settings.js"></script>

@include('includes.header')

<div class="container" style="max-width: 960px;">
    <div class="row justify-content-center">
        <div id="settings" class="col-md-8">
            <div class="border rounded-1 bg-white shadow">
                <form id="settings-form" class="p-3">
                    <div class="row">
                        <div class="col-md-4 mb-3" style="min-width: 224px;">
                            <img id="avatar-preview" class="center img-responsive rounded border" style="width: 200px; height: 200px;" src="{{$current_user['avatar']}}" alt="Аватар">
                        </div>
                        <div class="col mb-3">
                            <input id="settings-name" class="form-control mb-2" type="text" name="name" placeholder="Новое имя пользователя">
                            <input id="settings-email" class="form-control mb-2" type="email" name="email" placeholder="Почта">
                            <input id="settings-password" class="form-control mb-2" type="password" name="password" placeholder="Смена пароля">
                            <input id="settings-password-confirm" class="form-control mb-2" type="password" name="password-confirm" placeholder="Подтверждение пароля">
                            <input id="settings-avatar" class="form-control" type="file" accept="image/*" name="avatar">
                        </div>
                    </div>
                    <div class="d-flex">
                        <button id="edit-button" type="submit" class="btn btn-primary">Сохранить</button>
                        <p class="text-danger settings-error" style="margin-left: 16px"></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection