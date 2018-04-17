/**
 * Created by Maxim.Narushevich on 04.04.2018.
 */
var elixir = require('laravel-elixir');
require('laravel-elixir-livereload');


elixir.config.assetsPath = 'themes/travel/assets';
elixir.config.publicPath = 'themes/travel/assets/compiled';

elixir(function (mix) {
    mix.sass('style.scss');

    mix.scripts([

        'bootstrap.js',
        'jquery-3.3.1.js',
        'app.js'
    ]);

    mix.livereload([
        'themes/travel/assets/compiled/css/style.css',
        'themes/travel/**/*.htm',
        'themes/travel/assets/compiled/js/*.js'
    ]);

});