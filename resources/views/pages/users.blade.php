@extends('layouts.main-layout')

@section('title', 'About | Поиск')

@section('content')

<script src="/static/js/users.js"></script>

@include('includes.header')

<div class="container" style="max-width: 960px;">
    <div class="row justify-content-center">
        <div id="users" class="col-md-6 mt-3">
            <div class="border rounded-1 p-3 bg-white shadow">
                <input id="input-search" class="form-control" type="search" name="search" placeholder="Поиск">
                <div id="search-list" class="list-group-flush mt-3 overflow-auto" style="height: 45vh;"></div>
            </div>
        </div>
    </div>
</div>

@endsection