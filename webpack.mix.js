const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .copy('resources/assets/image/*.*', 'public/assets/image')
    .copy('resources/assets/image/tmp/*.*', 'public/images/tmp')
    .copy('resources/assets/font/*.*', 'public/assets/font')
    .copy('resources/assets/favicon/*.*', 'public/assets/favicon');


mix.js('resources/views/index.js', 'public/js');




