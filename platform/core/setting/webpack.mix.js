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

const source = 'platform/core/setting';
const dist = 'public/vendor/core';

mix
    .js(source + '/resources/assets/js/setting.js', dist + '/js')
    .copy(dist + '/js/setting.js', source + '/public/js')

    .sass(source + '/resources/assets/sass/setting.scss', dist + '/css')
    .copy(dist + '/css/setting.css', source + '/public/css')
