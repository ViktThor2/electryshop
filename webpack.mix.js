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

 mix.scripts([
   'node_modules/admin-lte/plugins/jquery/jquery.js',
   'node_modules/admin-lte/plugins/bootstrap/js/bootstrap.js',
   'node_modules/admin-lte/plugins/popper/umd/popper.js',
   'node_modules/admin-lte/plugins/select2/js/select2.js',
   'node_modules/admin-lte/plugins/select2/js/i18n/hu.js',
   'node_modules/admin-lte/plugins/sweetalert2/sweetalert2.min.js',
   'node_modules/admin-lte/dist/js/adminlte.js',
 ], 'public/js/admin.js')
  .sass('resources/sass/admin.scss', 'public/css')
  .js([
    'node_modules/mdb-ui-kit/js/mdb.min.js',
  ], 'public/js/frontend.js')
  .sass('resources/sass/frontend.scss', 'public/css');
