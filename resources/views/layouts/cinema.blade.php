@extends('layouts.mother')

@push('scripts')
@endpush

@push('styles')
    <link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/cinema.css') }}" rel="stylesheet">
@endpush

@section('body')
    @yield('content')
@endsection