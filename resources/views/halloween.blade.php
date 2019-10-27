@extends('layouts.mother')

@push('styles')
    <link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/cinema.css') }}" rel="stylesheet">
@endpush

@section('body')
<div class='twitchWrapper'>
  <div class='twitchStream'>
    <iframe src="https://player.angelthump.com/?channel=ledrivein" style="border: 0;" webkitallowfullscreen allowfullscreen frameborder="no"></iframe>
  </div>
  <div class='twitchChat'>
    <iframe frameborder="0" scrolling="no" src="https://www.twitch.tv/embed/rurulmf/chat"></iframe>
  </div>
</div>
@endsection
