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
    .sass('resources/sass/app.scss', 'public/css');


    mix.styles([
        // 'public/asset/plugins/bootstrap-4.1.2/bootstrap.min.css',
        'public/adminLte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
        'public/adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        'public/adminLte/plugins/jqvmap/jqvmap.min.css',
        'public/adminLte/dist/css/adminlte.min.css',
        'public/adminLte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
        'public/adminLte/plugins/daterangepicker/daterangepicker.css',
        'public/adminLte/plugins/summernote/summernote-bs4.min.css',
        'public/adminLte/plugins/toastr/toastr.min.css',
        'public/adminLte/plugins/sweetalert2/sweetalert2.min.css'
    ], 'public/css/styles.css'); //CARGA LOS ESTILOS DE ADMINLTE EN EL LAYOUT ADMIN


    mix.scripts([
        // 'public/adminLte/plugins/jquery/jquery.min.js',
        // 'public/adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js',
        // 'public/asset/js/jquery-3.2.1.min.js',
        // 'public/asset/plugins/bootstrap-4.1.2/popper.js',
        // 'public/asset/plugins/bootstrap-4.1.2/bootstrap.min.js',
        'public/adminLte/plugins/chart.js/Chart.min.js',
        'public/adminLte/plugins/sparklines/sparkline.js',
        'public/adminLte/plugins/jqvmap/jquery.vmap.min.js',
        'public/adminLte/plugins/jqvmap/maps/jquery.vmap.usa.js',
        'public/adminLte/plugins/jquery-knob/jquery.knob.min.js',
        'public/adminLte/plugins/moment/moment.min.js',
        'public/adminLte/plugins/daterangepicker/daterangepicker.js',
        'public/adminLte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
        'public/adminLte/plugins/summernote/summernote-bs4.min.js',
        'public/adminLte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
        'public/adminLte/plugins/toastr/toastr.min.js',
        'public/adminLte/plugins/sweetalert2/sweetalert2.min.js',
        'public/fullcalendar-6.1.8/dist/index.global.js',
        'public/adminLte/dist/js/adminlte.js',
    ], 'public/js/plugins.js');  //VA EN EL LAYOUT ADMIN IGUAL

    mix.js('resources/js/admin.js', 'public/js');
    