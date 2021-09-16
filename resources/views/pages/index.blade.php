@extends('layouts.main-layout')

@section('title', 'About | Главная')

@section('content')

<script src="/static/js/index.js"></script>

@include('includes.header')

<div class="container" style="max-width: 960px;">
    <div class="row mt-3">
        <div id="thread-list" class="col-md-2 list-group-flush rounded-1 overflow-auto" style="max-height: 50vh;"></div>
        <div id="thread" class="col-md-8 p-2 border rounded-1 bg-white" style="display:none">
            <div id="message-list" class="overflow-auto mb-2" style="height: 50vh;"></div>
            <input id="input-message" class="form-control" type="text" name="message" placeholder="Введите сообщение">
        </div>
    </div>
</div>

@endsection