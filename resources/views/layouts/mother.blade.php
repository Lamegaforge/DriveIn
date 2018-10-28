<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'LAMEGAFORGE') }}</title>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    @stack('scripts')
    @stack('styles')
</head>
<body>
	@yield('body')
</body>
</html>