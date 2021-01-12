const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |


 We dont need the resources/js/app.js because this if for Vue bundling
 */

//.js("resources/js/app.js", "public/js")

mix.sass("resources/sass/app.scss", "public/css").browserSync({
    proxy: "localhost:8000",
});
