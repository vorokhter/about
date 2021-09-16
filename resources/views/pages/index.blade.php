@extends('layouts.main-layout')

@section('title', 'About | Главная')

@section('content')

<script src="/static/js/index.js"></script>

@include('includes.header')

<div class="container" style="max-width: 960px;">
    <div class="row">
        <div class="col-md-3">

            <input id="input-search" class="form-control mt-3" type="search" name="search" placeholder="Поиск">
            <ul id="search-list" class="list-group"></ul>

            <ul id="thread-list" class="list-group mt-3"></ul>

        </div>
        <div class="col-md-9">

            <div id="message-list" class="border rounded-2 mt-3 overflow-auto bg-white pt-2 pb-3" style="width: 100%; height: 50vh;"></div>

            <input id="input-message" class="form-control mt-3" type="text" name="message" placeholder="Введите сообщение">

        </div>
    </div>
</div>

@endsection