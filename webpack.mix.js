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

mix.js('resources/js/cours.js', 'public/js').react()
mix.js('resources/js/gestionOrdre.js', 'public/js')
mix.js('node_modules/axios/dist/axios.min.js', 'public/js')
    .sass('resources/sass/default.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/accueil.scss', 'public/css')
    .sass('resources/sass/formation.scss', 'public/css')
    .sass('resources/sass/nav.scss', 'public/css')
    .sass('resources/sass/reset.scss', 'public/css')
    .sass('resources/sass/contact.scss', 'public/css')
    .sass('resources/js/components/wrapper/modules.scss', 'public/css')
    .sass('resources/js/components/videos/video.scss', 'public/css')
    .sass('resources/js/components/stepper/stepper.scss', 'public/css')
    .sass('resources/js/components/quiz/quiz.scss', 'public/css');


    // .sass('resources/js/components/accordeon/accordeon.scss', 'public/css')

    