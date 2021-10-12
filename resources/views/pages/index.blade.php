@extends('layouts.main-layout')

@section('title', 'About | Чаты')

@section('content')

<script src="/static/js/index.js"></script>

@include('includes.header')

<div class="container" style="max-width: 960px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="thread-list"></div>
        </div>
        <div id="thread" class="col-md-8" style="display:none">
            <div class="border rounded-1 bg-white shadow">
                <div class="p-3 border-bottom">
                    <div id="user-bar"></div>
                </div>
                <div class="p-3">
                    <div id="message-list" class="overflow-auto" style="height: 58.5vh;"></div>
                </div>
                <div class="p-3 border-top d-flex flex-nowrap align-items-center">
                    <input id="input-message" class="form-control" type="text" name="message" placeholder="Введите сообщение">
                    <div id="send-message" style="margin-left: 16px; cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-chat-left-text text-primary" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                            <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection