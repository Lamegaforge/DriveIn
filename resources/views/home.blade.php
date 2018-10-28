@extends('layouts.cinema')

@section('content')
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
    <iframe src="https://www.ustream.tv/embed/23618633?html5ui" style="border: 0;" webkitallowfullscreen allowfullscreen frameborder="no"></iframe>
    <!-- <iframe src="https://player.twitch.tv/?channel=**YOUR-CHANNEL-NAME**" frameborder="0" scrolling="no"></iframe> -->
  </div>
  <div class='twitchChat'>
    <iframe frameborder="0" scrolling="no" src="https://www.twitch.tv/embed/rurulmf/chat"></iframe>
  </div>
</div>
@endsection
