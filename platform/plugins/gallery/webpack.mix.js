let mix = require('laravel-mix');

let directory = __dirname.substring(__dirname.lastIndexOf('/') + 1, __dirname.length);

const source = 'platform/plugins/' + directory;
const dist = 'public/vendor/core/plugins/' + directory;

mix
    .sass(source + '/resources/assets/sass/gallery.scss', dist + '/css')
    .sass(source + '/resources/assets/sass/object-gallery.scss', dist + '/css')
    .sass(source + '/resources/assets/sass/admin-gallery.scss', dist + '/css')

    .js(source + '/resources/assets/js/gallery.js', dist + '/js/gallery.js')
    .js(source + '/resources/assets/js/gallery-admin.js', dist + '/js/gallery-admin.js')
    .js(source + '/resources/assets/js/object-gallery.js', dist + '/js/object-gallery.js')

    .copy(dist + '/js', source + '/public/js')
    .copy(dist + '/css', source + '/public/css');
