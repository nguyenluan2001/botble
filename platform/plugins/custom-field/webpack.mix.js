let mix = require('laravel-mix');

let directory = __dirname.substring(__dirname.lastIndexOf('/') + 1, __dirname.length);

const source = 'platform/plugins/' + directory;
const dist = 'public/vendor/core/plugins/' + directory;

mix
    .sass(source + '/resources/assets/sass/edit-field-group.scss', dist + '/css')
    .sass(source + '/resources/assets/sass/custom-field.scss', dist + '/css')
    .js(source + '/resources/assets/js/edit-field-group.js', dist + '/js')
    .js(source + '/resources/assets/js/use-custom-fields.js', dist + '/js')
    .js(source + '/resources/assets/js/import-field-group.js', dist + '/js')

    .copy(dist + '/css', source + '/public/css')
    .copy(dist + '/js', source + '/public/js');
