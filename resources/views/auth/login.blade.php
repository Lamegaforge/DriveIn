@extends('layouts.app')

@section('content')
<div class="wrapper">
    <h1>{{ __('Login') }}</h1>
    <p class='describe'>To sign-up for a free basic account please provide us with some basic information using
    the contact form below. Please use valid credentials.</p>
    @if ($errors->has('email') || $errors->has('password'))
      <p class='invalid-feedback'>qsdqsdsqdq</p>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class='input-block'>
            <input name='email' class="email" placeholder="{{ __('Email') }}" type="text" value="{{ old('email') }}" required>
        </div>
        <div class='input-block'>    
            <input name='password' class="password" placeholder="{{ __('Password') }}" type="password" required>
        </div>  
        <input class="submit" value="{{ __('Login') }}" type="submit">
        <a class="forget-password" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
        </a>  
    </form>
</div>
@endsection
