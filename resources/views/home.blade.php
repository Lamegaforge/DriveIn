@extends('layouts.mother')

@push('styles')
    <link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/cinema.css') }}" rel="stylesheet">
@endpush

@section('body')
<div id="terminal">
  !# System.Root.$~{{auth()->user()->name}} -access MEGACINE:
    @can('manage-token', auth()->user())
      <a href="{{ route('token.index') }}">Tokens</a>
    @endcan
    @can('manage-user', auth()->user())
      <a href="{{ route('user.index') }}">Users</a>
    @endcan  
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>  
</div>
<div class='twitchWrapper'>
  <div class='twitchStream'>
    <iframe src="https://player.angelthump.com/?channel=ledrivein" style="border: 0;" webkitallowfullscreen allowfullscreen frameborder="no"></iframe>
  </div>
  <div class='twitchChat'>
    <iframe frameborder="0" scrolling="no" src="https://www.twitch.tv/embed/lamegaforgelive/chat"></iframe>
  </div>
</div>
@endsection
