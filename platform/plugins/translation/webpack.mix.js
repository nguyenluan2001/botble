let mix = require('laravel-mix');

let directory = __dirname.substring(__dirname.lastIndexOf('/') + 1, __dirname.length);

const source = 'platform/plugins/' + directory;
const dist = 'public/vendor/core/plugins/' + directory;

mix
    .js(source + '/resources/assets/js/translation.js', dist + '/js')
    .js(source + '/resources/assets/js/locales.js', dist + '/js')
    .js(source + '/resources/assets/js/theme-translations.js', dist + '/js')

    .sass(source + '/resources/assets/sass/translation.scss', dist + '/css')
    .sass(source + '/resources/assets/sass/theme-translations.scss', dist + '/css')

    .copy(dist + '/js', source + '/public/js')
    .copy(dist + '/css', source + '/public/css');
