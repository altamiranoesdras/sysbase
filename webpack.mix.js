const { mix } = require('laravel-mix')

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
// .sourceMaps()
    .combine(
        [
            'node_modules/font-awesome/css/font-awesome.min.css',
            'node_modules/ionicons/dist/css/ionicons.min.css',
            'node_modules/admin-lte/dist/css/adminlte.min.css',
            'node_modules/icheck/skins/square/blue.css',
            'node_modules/toastr/build/toastr.min.css',
        ]
        , 'public/css/all.css'
    )
    //Plugin bootstrap-fileinput
    .copy('node_modules/bootstrap-fileinput/css','public/plugins/bootstrap-fileinput/css/')
    .copy('node_modules/bootstrap-fileinput/js','public/plugins/bootstrap-fileinput/js/')
    .copy('node_modules/bootstrap-fileinput/img','public/plugins/bootstrap-fileinput/img/')
    //Plugin Select2
    .copy('node_modules/select2/dist','public/plugins/select2/dist/')
    //FONTS
    .copy('node_modules/font-awesome/fonts/*.*','public/fonts/')
    .copy('node_modules/ionicons/dist/fonts/*.*','public/fonts/')
    .copy('node_modules/ionicons/dist/fonts/*.*','public/fonts/')
    //AdminLTE DIST Y PLUGINS
    // .copy('node_modules/admin-lte/dist','public/dist')
    // .copy('node_modules/admin-lte/plugins','public/plugins')
    //Datatables bs4
    .copy('node_modules/datatables.net/js','public/plugins/datatables.net/js')
    .copy('node_modules/datatables.net-bs4/js','public/plugins/datatables.net-bs4/js')
    .copy('node_modules/datatables.net-bs4/css','public/plugins/datatables.net-bs4/css')
    //Datatables buttons
    .copy('node_modules/datatables.net-buttons/js','public/plugins/datatables.net-buttons/js')
    .copy('node_modules/datatables.net-buttons-bs4/js','public/plugins/datatables.net-buttons-bs4/js')
    .copy('node_modules/datatables.net-buttons-bs4/css','public/plugins/datatables.net-buttons-bs4/css')
    //Datatables Responsive
    .copy('node_modules/datatables.net-responsive/js','public/plugins/datatables.net-responsive/js')
    .copy('node_modules/datatables.net-responsive-bs4/js','public/plugins/datatables.net-responsive-bs4/js')
    .copy('node_modules/datatables.net-responsive-bs4/css','public/plugins/datatables.net-responsive-bs4/css')
    //Jquery UI
    .copy('node_modules/jquery-ui-dist','public/plugins/jquery-ui-dist')
    .copy('node_modules/toastr/build/toastr.min.js','public/js/toastr.min.js')

// if (mix.config.inProduction) {
//     mix.version();
//     mix.minify();
// }

mix.browserSync({
    proxy: 'http://sysbase.local',
    open: false
})
