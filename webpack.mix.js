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

mix.js('resources/app.js', 'public/js')
    .vue()
    .css('node_modules/normalize.css/normalize.css', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css');