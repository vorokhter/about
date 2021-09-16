@extends('layouts.main-layout')

@section('title', 'About | Авторизация')

@section('content')

<script src="/static/js/auth.js"></script>

<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="card bg-light" style="width: 320px;">
        <div class="card-body">
            @include('includes.login-form')
            @include('includes.registration-form')
        </div>
    </div>
</div>

@endsection