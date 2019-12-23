@extends('layouts.mother')

@push('styles')
    <link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/cinema.css') }}" rel="stylesheet">
    <link href="{{ asset('css/christmas.css') }}" rel="stylesheet">
    <script type="text/javascript">
    function garland() {
        section = document.getElementById('section').innerHTML

        var lights = [
            ['garland_0', 1],
            ['garland_1', 2],
            ['garland_2', 3],
            ['garland_3', 0],
        ];

        lightUp(lights[section]);
    }

    function lightUp(garland) {
        document.getElementById('garland').className = garland[0];
        document.getElementById('section').innerHTML = garland[1];
    }

    setInterval(function() {
        garland();
    }, 600)
    </script>
@endpush

@section('body')

<div id="garland" class="garland_4">
  <div id="section">1</div>
</div>

<header>
    <img src="/images/christmas/logo.png">
</header>

<div class='twitchWrapper'>
  <div class='twitchStream'>
    <iframe src="https://player.angelthump.com/?channel=ledrivein" style="border: 0;" webkitallowfullscreen allowfullscreen frameborder="no"></iframe>
  </div>
  <div class='twitchChat'>
    <iframe frameborder="0" scrolling="no" src="https://www.twitch.tv/embed/rurulmf/chat"></iframe>
  </div>
</div>
@endsection
