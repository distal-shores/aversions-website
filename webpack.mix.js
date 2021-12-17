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
.js('resources/js/published.js', 'public/js/')
.js('resources/js/contactForm.js', 'public/js/')
.js('resources/js/collapsible.js', 'public/js/')
.js('resources/js/splash.js', 'public/js/')
.sourceMaps().sass('resources/sass/app.scss', 'public/css');

mix.copyDirectory('resources/fonts', 'public/fonts');

mix.copyDirectory('node_modules/tinymce/plugins', 'public/node_modules/tinymce/plugins');
mix.copyDirectory('node_modules/tinymce/skins', 'public/node_modules/tinymce/skins');
mix.copyDirectory('node_modules/tinymce/themes', 'public/node_modules/tinymce/themes');
mix.copyDirectory('node_modules/tinymce/icons', 'public/node_modules/tinymce/icons');
mix.copy('node_modules/tinymce/jquery.tinymce.js', 'public/node_modules/tinymce/jquery.tinymce.js');
mix.copy('node_modules/tinymce/jquery.tinymce.min.js', 'public/node_modules/tinymce/jquery.tinymce.min.js');
mix.copy('node_modules/tinymce/tinymce.js', 'public/node_modules/tinymce/tinymce.js');
mix.copy('node_modules/tinymce/tinymce.min.js', 'public/node_modules/tinymce/tinymce.min.js');