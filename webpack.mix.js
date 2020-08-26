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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .copy('resources/assets/css/', 'public/css')
   .copy('resources/assets/js/', 'public/js')
   .copy('resources/assets/images', 'public/images')
   .copy('resources/assets/esv_images', 'public/esv_images')
   .copy('resources/assets/plugins', 'public/plugins')
   .copy('resources/assets/fonts', 'public/fonts')
   .copy('resources/assets/csv_file', 'public/csv_file')

