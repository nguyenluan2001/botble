let mix = require('laravel-mix');

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

const source = 'platform/core/table';
const dist = 'public/vendor/core';

mix
    .js(source + '/resources/assets/js/table.js', dist + '/js')
    .copy(dist + '/js/table.js', source + '/public/js')

    .js(source + '/resources/assets/js/filter.js', dist + '/js')
    .copy(dist + '/js/filter.js', source + '/public/js')

    .sass(source + '/resources/assets/sass/table.scss', dist + '/css')
    .copy(dist + '/css/table.css', source + '/public/css');
