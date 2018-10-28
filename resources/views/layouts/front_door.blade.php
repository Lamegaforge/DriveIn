@extends('layouts.mother')

@push('scripts')
    <script src="{{ asset('js/front_door.js') }}" defer></script>
@endpush

@push('styles')
    <link href="{{ asset('css/front_door.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
@endpush

@section('body')
    @yield('content')
    <div class='optimize'>
        <a href="{{ route('login') }}">login</a>
        <a href="{{ route('register') }}">register</a>
    </div>
@endsection