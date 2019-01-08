var elixir = require('laravel-elixir');

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

elixir(function(mix) {
	//front
    mix.styles([
    	'front/nucleo/css/nucleo.css',
    	'font-awesome.css', 
    	'front/argon.css', 
    	'front/custom.css'
    ], 'public/css/front.css');
    mix.scripts([
    	'jquery.js',
    	'front/popper.js',
    	'front/bootstrap4.js',
    	'front/headroom.js', 
    	'front/jQuery.headroom.js', 
    	'front/argon.js'
    ], 'public/js/front.js');


    //admin
    mix.styles([
    	'admin/bootstrap.css',
    	'font-awesome.css',
    	'admin/AdminLTE.css',
    	'admin/skin-blue.css'
    ], 'public/css/admin.css');
    mix.scripts([
    	'jquery.js',
    	'admin/bootstrap.js',
    	'admin/adminlte.js'
    ], 'public/js/admin.js');

    mix.copy('resources/assets/css/nucleo/fonts', 'public/fonts');
    mix.copy('node_modules/font-awesome/fonts', 'public/fonts');
});
