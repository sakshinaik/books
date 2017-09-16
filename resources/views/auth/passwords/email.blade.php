@extends('layouts.app')

@push('styles')
    <link href="/css/small-forms.css" rel="stylesheet" type="text/css">
    <link href="/css/passwords/email.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
<form method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}
    <fieldset>
        <legend class="center-text">Reset Password</legend>

        @if (session('status'))
            <div class="success">
                <span>
                    <strong>{{ session('status') }}</strong>
                </span>
            </div>
        @endif

        <div class="flex-container full-width">
            <label for="email" class="flex-item center-text full-width input-label">E-Mail Address</label>
            @if ($errors->has('email'))
                <div class="error error-middle flex-item">
                    <span>
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                </div>
            @endif
            <input id="email" type="email" class="flex-item full-width input-field" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="flex-item full-width">
            <button type="submit" class="center-horizontal">
                Send Password Reset Link
            </button>
        </div>
    </fieldset>
</form>
@endsection
