@extends('layouts.app')

@push('styles')
    <link href="/css/small-forms.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
<form method="POST" action="{{ route('password.request') }}" class="center">
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">

    <fieldset>
        <legend class="center-text">Reset Password</legend>

        <div class="flex-container full-width">
            <label for="name" class="flex-item center-text input-label">E-Mail Address</label>
            @if ($errors->has('email'))
                <div class="error flex-item">
                    <span>
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                </div>
            @endif
            <input id="email" type="email" class="flex-item input-field" name="email" value="{{ old('email') }}" required>
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
            <label for="password-confirm" class="flex-item center-text input-label">Confirm Password</label>
            <input id="password-confirm" type="password" class="flex-item input-field" name="password_confirmation" required>
        </div>

        <div class="flex-item full-width">
            <button type="submit" class="center-horizontal">
                Reset Password
            </button>
        </div>
    </fieldset>
</form>
@endsection