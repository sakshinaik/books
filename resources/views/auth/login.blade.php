@extends('layouts.app')

@push('styles')
    <link href="/css/small-forms.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <fieldset class="flex-container">
        <legend class="center-text">Login</legend>

        @if ($errors->has('email'))
            <div class="error">
                <span>
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            </div>
        @endif

        @if ($errors->has('password'))
            <div class="error">
                <span>
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            </div>
        @endif

        <div class="flex-container flex-item">
            <label for="email" class="flex-item center-text input-label">E-Mail Address</label>
            <input id="email" type="email" class="flex-item" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="flex-container flex-item">
            <label for="password" class="flex-item center-text input-label">Password</label>
            <input id="password" type="password" class="flex-item" name="password" required>

        </div>

        <div class="flex-container flex-item">
            <label class="flex-item center-text">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>

             <a class="flex-item center-text" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>

            <button type="submit" class="flex-item">
                Login
            </button>
        </div>
    </fieldset>
</form>
@endsection