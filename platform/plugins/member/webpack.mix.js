let mix = require('laravel-mix');

let directory = __dirname.substring(__dirname.lastIndexOf('/') + 1, __dirname.length);

const source = 'platform/plugins/' + directory;
const dist = 'public/vendor/core/plugins/' + directory;

mix
    .js(source + '/resources/assets/js/member-admin.js', dist + '/js')
    .js(source + '/resources/assets/js/app.js', dist + '/js')

    .sass(source + '/resources/assets/sass/member.scss', dist + '/css')
    .sass(source + '/resources/assets/sass/app.scss', dist + '/css')

    .copy(dist + '/js', source + '/public/js')
    .copy(dist + '/css', source + '/public/css');
