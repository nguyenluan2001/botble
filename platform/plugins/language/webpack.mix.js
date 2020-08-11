let mix = require('laravel-mix');

let directory = __dirname.substring(__dirname.lastIndexOf('/') + 1, __dirname.length);

const source = 'platform/plugins/' + directory;
const dist = 'public/vendor/core/plugins/' + directory;

mix
    .js(source + '/resources/assets/js/language.js', dist + '/js/language.js')
    .js(source + '/resources/assets/js/language-global.js', dist + '/js/language-global.js')
    .js(source + '/resources/assets/js/language-public.js', dist + '/js')

    .sass(source + '/resources/assets/sass/language.scss', dist + '/css')
    .sass(source + '/resources/assets/sass/language-public.scss', dist + '/css')

    .copy(dist + '/js', source + '/public/js')
    .copy(dist + '/css', source + '/public/css');
