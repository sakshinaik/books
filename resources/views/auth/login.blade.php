@extends('layouts.app')

@push('styles')
    <link href="/css/small-forms.css" rel="stylesheet" type="text/css">
    <link href="/css/login.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
<form method="POST" action="{{ route('login') }}" class="center">
    {{ csrf_field() }}

    <fieldset>
        <legend class="center-text">Login</legend>

        <div class="flex-container full-width">
            <label for="email" class="flex-item center-text input-label">E-Mail Address</label>
            @if ($errors->has('email'))
                <div class="error flex-item">
                    <span>
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                </div>
            @endif
            <input id="email" type="email" class="flex-item input-field" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="flex-container full-width">
            <label for="password" class="flex-item center-text input-label">Password</label>
            @if ($errors->has('password'))
                <div class="error flex-item">
                    <span>
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                </div>
            @endif
            <input id="password" type="password" class="flex-item input-field" name="password" required>

        </div>

        <div class="flex-container full-width">
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