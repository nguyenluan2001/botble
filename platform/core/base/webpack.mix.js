let mix = require('laravel-mix');
let glob = require('glob');

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

const source = 'platform/core/base';
const dist = 'public/vendor/core';

glob.sync(source + '/resources/assets/sass/themes/*.scss').forEach(item => {
    mix.sass(item, dist + '/css/themes').copy(dist + '/css/themes', source + '/public/css/themes');
})

mix
    .sass(source + '/resources/assets/sass/core.scss', dist + '/css')
    .copy(dist + '/css/core.css', source + '/public/css')

    .sass(source + '/resources/assets/sass/custom/system-info.scss', dist + '/css')
    .copy(dist + '/css/system-info.css', source + '/public/css')

    .sass(source + '/resources/assets/sass/custom/email.scss', dist + '/css')
    .copy(dist + '/css/email.css', source + '/public/css')

    .js(source + '/resources/assets/js/app.js', dist + '/js')
    .copy(dist + '/js/app.js', source + '/public/js')

    .js(source + '/resources/assets/js/core.js', dist + '/js')
    .copy(dist + '/js/core.js', source + '/public/js')

    .js(source + '/resources/assets/js/editor.js', dist + '/js')
    .copy(dist + '/js/editor.js', source + '/public/js')

    .js(source + '/resources/assets/js/cache.js', dist + '/js')
    .copy(dist + '/js/cache.js', source + '/public/js')

    .js(source + '/resources/assets/js/tags.js', dist + '/js')
    .copy(dist + '/js/tags.js', source + '/public/js')

    .js(source + '/resources/assets/js/system-info.js', dist + '/js')
    .copy(dist + '/js/system-info.js', source + '/public/js');

