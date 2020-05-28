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
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'theme/css/styles.css'],
        'public/css/admin.css')
        .scripts([
            'theme/js/scripts.js',
            'theme/js/chart-area-demo.js',
            'theme/js/chart-bar-demo.js',
            'theme/js/chart-pie-demo.js',
            'theme/js/datatables-demo.js'
        ],
        'public/js/admin.js');
