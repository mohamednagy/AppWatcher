let mix = require('laravel-mix');
let fs = require('fs');

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
let namespace = __dirname+'/AppWatcher';
let files = fs.readdirSync(namespace);
files.forEach(function(moduleName) {
      //compiling js files
      if (fs.existsSync(namespace + '/'+ moduleName +'/resources/assets/js/app.js')) {
        mix.js(namespace + '/' + moduleName+ '/resources/assets/js/app.js', 'public/js/' + moduleName + '-module.js');
      }
      // compiling scss files
      if (fs.existsSync(namespace + '/'+ moduleName + '/resources/assets/scss/app.scss')) {
         mix.sass(namespace + '/'+ moduleName + '/resources/assets/scss/app.scss', 'public/css/' + moduleName + '-module.css');
      }
});
// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');
