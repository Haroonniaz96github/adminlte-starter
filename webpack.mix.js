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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css')
//     .sourceMaps();

    mix.styles([
        'public/backend/plugins/fontawesome-free/css/all.min.css',
        'public/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
        'public/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        'public/backend/plugins/jqvmap/jqvmap.min.css',
        'public/backend/dist/css/adminlte.min.css',
        'public/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
        'public/backend/plugins/daterangepicker/daterangepicker.css',
        'public/backend/plugins/summernote/summernote-bs4.min.css',
    ], 'public/css/admin-dashboard.css');
    
    mix.scripts([
        'public/backend/plugins/jquery/jquery.min.js',
        'public/backend/plugins/jquery-ui/jquery-ui.min.js',
        'public/backend/uibutton.js',
        'public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'public/backend/plugins/chart.js/Chart.min.js',
        'public/backend/plugins/sparklines/sparkline.js',
        'public/backend/plugins/jqvmap/jquery.vmap.min.js',
        'public/backend/plugins/jqvmap/maps/jquery.vmap.usa.js',
        'public/backend/plugins/jquery-knob/jquery.knob.min.js',
        'public/backend/plugins/moment/moment.min.js',
        'public/backend/plugins/daterangepicker/daterangepicker.js',
        'public/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
        'public/backend/plugins/summernote/summernote-bs4.min.js',
        'public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
        'public/backend/dist/js/adminlte.js',
        'public/backend/dist/js/pages/dashboard.js',
    ], 'public/js/admin-dashboard.js');
