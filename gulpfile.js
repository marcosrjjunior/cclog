const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss');
    mix.copy('./resources/assets/css', 'public/css');
    mix.copy('./resources/assets/js', 'public/js');
    mix.copy('./resources/assets/fonts', 'public/fonts');
    mix.copy('./node_modules/font-awesome/fonts', 'public/fonts');
});
