<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <script src="{{ mix('js/app.js') }}"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('scripts')
</head>
<body>
	<main class="container-fluid">
    	@yield('content')
    </main>
</body>
</html>
