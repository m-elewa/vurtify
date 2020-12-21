const mix = require('laravel-mix');

mix.js('resources/js/app/scripts.js', 'public/app')
   .sass('resources/sass/app/styles.scss', 'public/app')
   .js('resources/js/guest/scripts.js', 'public/guest')
   .sass('resources/sass/guest/styles.scss', 'public/guest')
   .copyDirectory('resources/assets/images', 'public/images')
   .vue()
   .version();
