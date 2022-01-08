const mix = require('laravel-mix');
require('laravel-mix-tailwind');

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

mix.autoload({
        jquery: ['$', 'window.jQuery', 'jQuery'] // precargar jquery
    })
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/menu.js', 'public/js')
    .js('resources/js/estado-vacante.js', 'public/js')
    .js('resources/js/eliminar-vacante.js', 'public/js')
    .js('resources/js/lista-skills.js', 'public/js')
    .js('resources/js/lista-vacantes-datatable.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/menu.scss', 'public/css')
    .sass('resources/sass/estado-vacante.scss', 'public/css')
    .sass('resources/sass/eliminar-vacante.scss', 'public/css')
    .sass('resources/sass/lista-skills.scss', 'public/css')
    .sass('resources/sass/lista-vacantes-datatable.scss', 'public/css')
    .tailwind()
