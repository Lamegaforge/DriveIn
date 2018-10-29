@extends('layouts.front_door')

@section('content')
<div class="wrapper">
    <h1>Connexion</h1>
    <p class='describe'>Tu peux te connecter si tu oses.</p>
    @if ($errors->has('email') || $errors->has('password'))
      <p class='invalid-feedback'>Non, rentre chez toi.</p>
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
