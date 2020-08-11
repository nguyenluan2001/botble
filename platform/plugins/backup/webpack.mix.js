let mix = require('laravel-mix');

let directory = __dirname.substring(__dirname.lastIndexOf('/') + 1, __dirname.length);

const source = 'platform/plugins/' + directory;
const dist = 'public/vendor/core/plugins/' + directory;

mix
    .js(source + '/resources/assets/js/backup.js', dist + '/js')
    .sass(source + '/resources/assets/sass/backup.scss', dist + '/css')

    .copy(dist + '/js', source + '/public/js')
    .copy(dist + '/css', source + '/public/css');
