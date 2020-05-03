<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <script src="{{ mix('js/app.js') }}"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('scripts')
</head>
<body>
	<div class="container-fluid overflow-auto">
    	@yield('content')
    </div>
</body>
</html>
