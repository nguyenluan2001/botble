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

let directory = __dirname.substring(__dirname.lastIndexOf('/') + 1, __dirname.length);

const source = 'platform/packages/' + directory;
const dist = 'public/vendor/core/packages/' + directory;

mix
    .js(source + '/resources/assets/js/slug.js', dist + '/js')
    .sass(source + '/resources/assets/sass/slug.scss', dist + '/css')

    .copy(dist + '/js', source + '/public/js')
    .copy(dist + '/css', source + '/public/css');
