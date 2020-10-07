let mix = require('laravel-mix');

const path = require('path');
let directory = path.basename(path.resolve(__dirname));

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
