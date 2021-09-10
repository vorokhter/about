@extends('layouts.main-layout')

@section('title', 'about')

@section('content')

@foreach($users as $user)
<p>{{ $user->name }}</p>
@endforeach

@endsection