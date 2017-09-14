@extends('layouts.app')

@push('styles')
    <link href="/css/welcome.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <section id="introduction" class="center-text">
        <p>Welcome to TK's Digital Bookshelf!</p>
        <p>Here you can keep track of your favorite books, without any of the bothersome content!</p>
    </section>
    <section id="next-steps" class="center-text">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
        <a href="/password/reset">Reset Password</a>
    </section>
@endsection