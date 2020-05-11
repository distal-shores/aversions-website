const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
.js('resources/js/getStates.js', 'public/js/')
.js('resources/js/header.js', 'public/js/')
.js('resources/js/datepicker.js', 'public/js/')
.js('resources/js/showList.js', 'public/js/')
.js('resources/js/quoteCarousel.js', 'public/js/')
.js('resources/js/newsletter.js', 'public/js/')
.js('resources/js/inCarousel.js', 'public/js/')
.sourceMaps().sass('resources/sass/app.scss', 'public/css');