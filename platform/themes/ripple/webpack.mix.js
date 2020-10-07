let mix = require('laravel-mix');

const path = require('path');
let directory = path.basename(path.resolve(__dirname));

const source = 'platform/themes/' + directory;
const dist = 'public/themes/' + directory;

mix
    .sass(source + '/assets/sass/style.scss', dist + '/css')
    .copy(dist + '/css/style.css', source + '/public/css')
    .js(source + '/assets/js/ripple.js', dist + '/js')
    .copy(dist + '/js/ripple.js', source + '/public/js');
