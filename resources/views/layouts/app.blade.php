<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <script src="{{ mix('js/app.js') }}"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
    	@yield('content')
    </div>
</body>
</html>
