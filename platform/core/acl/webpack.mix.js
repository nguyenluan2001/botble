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

const source = 'platform/core/acl';
const dist = 'public/vendor/core';

mix
    .js(source + '/resources/assets/js/profile.js', dist + '/js')
    .copy(dist + '/js/profile.js', source + '/public/js')

    .js(source + '/resources/assets/js/login.js', dist + '/js')
    .copy(dist + '/js/login.js', source + '/public/js')

    .js(source + '/resources/assets/js/role.js', dist + '/js')
    .copy(dist + '/js/role.js', source + '/public/js')

    .sass(source + '/resources/assets/sass/login.scss', dist + '/css')
    .copy(dist + '/css/login.css', source + '/public/css');
