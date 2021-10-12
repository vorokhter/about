@extends('layouts.main-layout')

@section('title', 'About | Поиск')

@section('content')

<script src="/static/js/users.js"></script>

@include('includes.header')

<div class="container" style="max-width: 960px;">
    <div class="row justify-content-center">
        <div id="users" class="col-md-8">
            <div class="border rounded-1 bg-white shadow">
                <div class="p-3 border-bottom">
                    <input id="input-search" class="form-control" type="search" name="search" placeholder="Поиск">
                </div>
                <div class="p-3">
                    <div id="search-list" class="list-group-flush overflow-auto" style="height: 67vh;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection