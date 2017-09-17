@extends('layouts.app')

@section('content')
@if (count($books) === 0)
    <section id="introduction">
        <h2>You don't have any books!</h2>
        <p>Click <a href="{{ route('book.add') }}">here</a> to get started.</p>
    </section>
@endif


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
