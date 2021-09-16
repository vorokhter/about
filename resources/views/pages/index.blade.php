@extends('layouts.main-layout')

@section('title', 'About | Главная')

@section('content')

<script src="/static/js/index.js"></script>

@include('includes.header')

<div class="container" style="max-width: 960px;">
    <div class="d-flex align-items-start mt-3 p-3 border rounded-2 bg-white">
        <div class="nav col-md-2 nav-pills" id="thread-list" role="tablist" aria-orientation="vertical"></div>
        <div class="tab-content col-md-10">
            <div id="message-list" class="overflow-auto" style="height: 50vh;"></div>
            <input id="input-message" class="form-control mt-3" type="text" name="message" placeholder="Введите сообщение">
        </div>
    </div>
</div>

@endsection