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
mix
    .js(['resources/js/app.js'], 'public/js')
    .extract(['jquery', 'bootstrap', 'lodash', 'jquery-ui', 'popper.js', 'izitoast', 'select2', 'chart.js'])
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery'],
        popper: ['Popper'],
        iziToast: ['izitoast', 'iziToast']
    })
    .options({
        processCssUrls: false,
        uglify: true
    })
    .copy('resources/Icon-font-7', 'public/Icon-font-7')
    // .copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/fonts')
    .copy('resources/js/main.js', 'public/js/main.js')
    .sass('resources/sass/app.scss', 'public/css/styles.css')
    .minify(['public/css/app.css','public/js/main.js','public/js/vendor.js','public/js/manifest.js'])
    .version();
