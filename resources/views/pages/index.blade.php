@extends('layouts.main-layout')

@section('title', 'About | Чаты')

@section('content')

<script src="/static/js/index.js"></script>

@include('includes.header')

<div class="container" style="max-width: 960px;">
    <div class="row">
        <div class="col-md-4 mt-4">
            <div id="thread-list" class="shadow overflow-auto"></div>
        </div>
        <div id="thread" class="col-md-8 mt-4" style="display:none">
            <div class="border rounded-1 bg-white shadow">
                <div class="p-3 border-bottom">
                    <div id="user-bar"></div>
                </div>
                <div class="p-3">
                    <div id="message-list" class="overflow-auto" style="height: 58.5vh;"></div>
                </div>
                <div class="p-3 border-top">
                    <input id="input-message" class="form-control" type="text" name="message" placeholder="Введите сообщение">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection