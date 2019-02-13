<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Taskbook</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="{{ asset('fancybox/jquery.min.js') }}"></script>
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset('fancybox/jquery.fancybox.css') }}">
		<script type="text/javascript" src="{{ asset('fancybox/jquery.fancybox.js') }}"></script>
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">
		<script src="{{ asset('js/script.js') }}"></script>
		<link rel="stylesheet" type="text/css" href="http://www.expertphp.in/css/bootstrap.css">

    </head>
    <body>
    	<div class="content">
    	@yield('content')
    	</div>
    </body>
</html>