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
    .sass('resources/sass/app.scss', 'public/css');

//mix.copy('node_modules/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css', 'public/css/tempusdominus.css');
//mix.copy('node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js', 'public/js/tempusdominus.js');
