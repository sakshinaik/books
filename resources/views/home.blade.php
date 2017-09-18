@extends('layouts.app')

@push('styles')
    <link href="/css/home.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
@if (count($books) === 0)
    <section id="introduction">
        <h2>You don't have any books!</h2>
        <p>Click <a href="{{ route('book.add') }}">here</a> to get started.</p>
    </section>
@endif

@include('book.index')

@endsection
