const mix = require('laravel-mix');
require('laravel-mix-svg-vue');
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

mix.js('resources/js/User/app.js', 'public/js/User').js('resources/js/Admin/app.js', 'public/js/Admin')
    .vue()
    .svgVue()
    .sass('resources/sass/User/app.scss', 'public/css/User').sass('resources/sass/Admin/app.scss', 'public/css/Admin');
