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

const source = 'platform/core/media';
const dist = 'public/vendor/core/media';

mix
    .sass(source + '/resources/assets/sass/media.scss', dist + '/css')
    .js(source + '/resources/assets/js/media.js', dist + '/js')
    .js(source + '/resources/assets/js/jquery.addMedia.js', dist + '/js')
    .js(source + '/resources/assets/js/integrate.js', dist + '/js')
    .copy(dist + '/js', source + '/public/media/js')
    .copy(dist + '/css', source + '/public/media/css')
