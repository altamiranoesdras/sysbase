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
// .copy('node_modules/font-awesome/fonts/*.*','public/fonts/')
// .copy('node_modules/ionicons/dist/fonts/*.*','public/fonts/')

//AdminLTE DIST Y PLUGINS
// .copy('node_modules/admin-lte/dist','public/dist')
// .copy('node_modules/admin-lte/plugins','public/plugins')


// if (mix.config.inProduction) {
//     mix.version();
//     mix.minify();
// }

mix.browserSync({
    proxy: 'http://tracking.local',
    open: false
})
