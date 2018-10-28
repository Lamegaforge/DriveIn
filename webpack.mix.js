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

mix.js('resources/js/front_door.js', 'public/js')
   .sass('resources/sass/front_door.scss', 'public/css');

mix.js('resources/js/cinema.js', 'public/js')
   .sass('resources/sass/cinema.scss', 'public/css');

mix.js('resources/js/admin.js', 'public/js')
   .sass('resources/sass/admin.scss', 'public/css');
