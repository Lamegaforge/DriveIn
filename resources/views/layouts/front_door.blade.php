<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"><meta name="robots" content="noindex">
    <!-- Scripts -->
    <script src="{{ asset('js/front_door.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/front_door.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
</head>
<body>
@yield('content')
<div class='optimize'>
  <a href="{{ route('login') }}">login</a>
  <a href="{{ route('register') }}">register</a>
</div>
</body>
</html>