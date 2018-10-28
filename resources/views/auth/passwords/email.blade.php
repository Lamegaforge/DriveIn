@extends('layouts.app')

@section('content')
<div class="wrapper">
    <h1>{{ __('Reset Password') }}</h1>
    <p class='describe'>To sign-up for a free basic account please provide us with some basic information using
    the contact form below. Please use valid credentials.</p>


    @if (session('status'))
        <p class='invalid-feedback'>{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class='input-block'>
            <input name='email' class="email" placeholder="{{ __('Email') }}" type="text" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif            
        </div>
        <input class="submit" value="{{ __('Send Password Reset Link') }}" type="submit">
    </form>
</div>
@endsection
