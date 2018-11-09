const { mix } = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    //asios
    // .copy('node_modules/axios/dist/axios.min.js','public/js')
    // //vuejs
    // .copy('node_modules/vue/dist/vue.js','public/js')
    // //input mask
    // .copy('node_modules/inputmask/dist/jquery.inputmask.bundle.js','public/js')
    // .copy('node_modules/inputmask/dist/inputmask/bindings/inputmask.binding.js','public/js')
    // //sweet allert
    // .copy('node_modules/sweetalert2/dist/sweetalert2.min.js','public/js')
    // .copy('node_modules/sweetalert2/dist/sweetalert2.min.css','public/css')
    // //Export buttons datatables
    // .copy('node_modules/jzip/jzip.js','public/js')
    // .copy('node_modules/pdfmake/build/pdfmake.min.js','public/js')
    // .copy('node_modules/pdfmake/build/vfs_fonts.js','public/js')
    // //toastr
    // .copy('node_modules/toastr/build/toastr.min.css','public/css')
    // .copy('node_modules/toastr/build/toastr.min.js','public/js')
    // //Datatables bs4
    // .copy('node_modules/datatables.net/js','public/plugins/datatables.net/js')
    // .copy('node_modules/datatables.net-bs4/js','public/plugins/datatables.net-bs4/js')
    // .copy('node_modules/datatables.net-bs4/css','public/plugins/datatables.net-bs4/css')
    // //Datatables buttons
    // .copy('node_modules/datatables.net-buttons/js','public/plugins/datatables.net-buttons/js')
    // .copy('node_modules/datatables.net-buttons-bs4/js','public/plugins/datatables.net-buttons-bs4/js')
    // .copy('node_modules/datatables.net-buttons-bs4/css','public/plugins/datatables.net-buttons-bs4/css')
    // //Datatables Responsive
    // .copy('node_modules/datatables.net-responsive/js','public/plugins/datatables.net-responsive/js')
    // .copy('node_modules/datatables.net-responsive-bs4/js','public/plugins/datatables.net-responsive-bs4/js')
    // .copy('node_modules/datatables.net-responsive-bs4/css','public/plugins/datatables.net-responsive-bs4/css')
    // //datetimepicker
    // .copy('node_modules/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css','public/css')
    // .copy('node_modules/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js','public/js')
    // //moment
    // .copy('node_modules/moment/min/moment.min.js','public/js/moment')
    // .copy('node_modules/moment/locale/es.js','public/js/moment')

var SWPrecacheWebpackPlugin = require('sw-precache-webpack-plugin');
mix.webpackConfig({
    plugins: [
        new SWPrecacheWebpackPlugin(
            {
                cacheId: 'myapp',
                filename: 'sw.js',
                maximumFileSizeToCacheInBytes: 4194304,
                minify: false,
                runtimeCaching: [{
                    handler: 'cacheFirst',
                    urlPattern: /fonts\/.*$/,
                }],
            }
        ),
    ]
});

// mix.browserSync({
//     proxy: 'http://negocios.local',
//     open: false
// });
