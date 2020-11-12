const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app/scripts.js', 'public/app')
   .sass('resources/sass/app/styles.scss', 'public/app')
   .js('resources/js/guest/scripts.js', 'public/guest')
   .sass('resources/sass/guest/styles.scss', 'public/guest')
   .copyDirectory('resources/assets/images', 'public/images')
   .version();
