let mix = require('laravel-mix');

let directory = __dirname.substring(__dirname.lastIndexOf('/') + 1, __dirname.length);

const source = 'platform/plugins/' + directory;
const dist = 'public/vendor/core/plugins/' + directory;

mix
    .sass(source + '/resources/assets/sass/contact.scss', dist + '/css')
    .js(source + '/resources/assets/js/contact.js', dist + '/js')

    .copy(dist + '/css', source + '/public/css')
    .copy(dist + '/js', source + '/public/js');
