<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
    <div id="app">
        

        <main class="py-4">
            @yield('content')
            <script src="{{ asset('js/jquery.min.js')}}"></script>
            <script src="{{ asset('js/popper.js')}}"></script>
            <script src="{{ asset('js/bootstrap.min.js')}}"></script>
            <script src="{{ asset('js/main.js')}}"></script>
            
    </body>
</html>
            
          