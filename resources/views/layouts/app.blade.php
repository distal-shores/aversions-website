<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <script src="{{ mix('js/app.js') }}"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aversions Vancouver</title>
    <meta name="description" content="Website for Vancouver post-punk band Aversions: music, news, shows, merch and more."/>
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Website for Vancouver post-punk band Aversions: music, news, shows, merch and more." />
    <meta property="og:image" content="@yield('ogimg', asset('images/og_preview_band_railing.jpg'))" />
    <meta property="og:title" content="Aversions Vancouver" />
    <meta name="keywords" content="post-punk, post-hardcore, band, Vancouver, independent music, live band, punk, British Columbia, Canada, post punk, post hardcore, grunge, alternative rock, alt-rock, art rock"/>
    <meta name="author" content="Sam Coll" />
	<meta name="copyright" content="Copyright Aversions" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
	@stack('robots')
    @stack('scripts')
</head>
<body>
	<main class="container-fluid">
    	@yield('content')
    </main>
</body>
</html>
