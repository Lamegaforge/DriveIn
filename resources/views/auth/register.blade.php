@extends('layouts.front_door')

@section('content')
<div class="wrapper">
  <h1>{{ __('Register') }}</h1>
  <p class='describe'>To sign-up for a free basic account please provide us with some basic information using
  the contact form below. Please use valid credentials.</p>
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class='input-block'>    
    <input name='token' class="token {{ $errors->has('token') ? ' is-invalid' : '' }}" placeholder="{{ __('Token') }}" type="text" value="{{ old('token') }}" required>
      @if ($errors->has('token'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('token') }}</strong>
          </span>
      @endif
      <p class="email-help" style="display: block;">Le token blablabla...</p>
    </div>   
    <div class='input-block'>    
    <input name='name' class="name {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('name') }}" type="text" value="{{ old('name') }}" required>
      @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>     
    <div class='input-block'>
      <input name='email' class="email {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="text" value="{{ old('email') }}" required>
      @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
    </div>
    <div class='input-block'>    
    <input name='password' class="password {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" required>
      @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
    </div>  
    <div class='input-block'>      
    <input name='password_confirmation' class="password {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="{{ __('Confirm Password') }}" type="password" required>
      @if ($errors->has('password_confirmation'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password_confirmation') }}</strong>
          </span>
      @endif
    </div>    
    <input class="submit" value="{{ __('Register') }}" type="submit">
  </form>
</div>
@endsection