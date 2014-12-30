<!DOCTYPE html>
<html>
<head>
	<title>Campanhas</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
</head>
<body>
		
	<!-- Navegação -->

	@if(Auth::check())

		@include('layouts.menu')

	@endif

	<div class="container">
	
		@yield('content')

	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>