<?php

/*
|--------------------------------------------------------------------------
| Defining Global Patterns
|--------------------------------------------------------------------------
|
*/

Route::pattern('id', '[0-9]+');

Route::pattern('year', '[0-9]+');

Route::pattern('month', '[0-9]+');

Route::pattern('slug', '[a-z\-0-9]+');

Route::pattern('username', '[a-z\-]+');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['namespace' => 'Soluciones\Controllers'], function(){

	/** HOME */
	Route::get('/',  ['as' => 'home', 'uses' => 'HomeController@index']);

	/** CONTACTO */
	Route::get('contacto', ['as' => 'contacto.index', 'uses' => 'ContactController@index']);

	/** LOGIN */
	Route::get('login', ['as' => 'session.create', 'uses' => 'SessionsController@create', 'before' => 'guest']);
	Route::post('login', ['as' => 'session.store', 'uses' => 'SessionsController@store', 'before' => 'guest']);
	Route::any('logout', ['as' => 'session.destroy', 'uses' => 'SessionsController@destroy']);

	/** PERFIL */
	Route::get('perfil/editar', [
		'as'     => 'profile.edit',
		'uses'   => 'ProfileController@edit',
		'before' => 'auth'
	]);

	Route::patch('perfil/{id}', [
		'as'     => 'profile.update',
		'uses'   => 'ProfileController@update',
		'before' => ['auth, csrf']
	]);

	/** BENEFICIOS */
	Route::get('beneficios', ['as' => 'benefits.index', 'uses' => 'BenefitsController@index']);
	Route::post('beneficios', ['as' => 'benefits.store', 'uses' => 'BenefitsController@store']);
	Route::post('beneficios', ['as' => 'benefits.store', 'uses' => 'BenefitsController@store']);

	/** BENEFICIOS - DOWNLOADS */
	Route::get('beneficios/descargas', [
		'as'     => 'downloads.show',
		'uses'   => 'DownloadsController@index',
		'before' => 'auth'
	]);

	Route::get('beneficios/{id}/print', ['as' => 'benefits.print', 'uses' => 'BenefitsController@printBenefit']);
	Route::get('beneficios/{id}/download', ['as' => 'benefits.download', 'uses' => 'BenefitsController@downloadBenefit']);
	Route::get('beneficios/{id}/redeem', ['as' => 'benefits.redeem', 'uses' => 'BenefitsController@redeemBenefit']);

	/** BENEFICIOS - CATEGORIES */
	Route::get('beneficios/categoria/{slug}', ['as' => 'benefits.category.show', 'uses' => 'BenefitsController@index']);

	/** EXPERIENCIAS */
	Route::get('experiencias', ['as' => 'experiences.index', 'uses' => 'ExperiencesController@index']);
	Route::get('experiencias/{slug}', ['as' => 'experiences.show', 'uses' => 'ExperiencesController@show']);

});


/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Register all of the application routes for admins.
|
*/

$adminRoute = [
	'prefix'    => 'admin',
	'namespace' => 'Admin\Controllers',
	'before'    => ['auth', 'admin']
];

Route::group($adminRoute, function(){

	Route::get('/', ['as' => 'admin.index', 'uses' => 'AdminController@index']);

	/** BENEFICIOS */
	Route::resource('beneficios', 'BenefitsController', ['except' => 'show']);
	Route::post('/beneficios/{id}', ['as' => 'admin.beneficios.restore', 'uses' => 'BenefitsController@restore']);

	/** CATEGORIES */
	Route::resource('categorias', 'CategoriesController', ['except' => 'show']);
	Route::post('/categorias/{id}', ['as' => 'admin.categorias.restore', 'uses' => 'CategoriesController@restore']);

	/** EXPERIENCIAS */
	Route::resource('experiencias', 'ExperiencesController', ['except' => 'show']);
	Route::post('/experiencias/{id}', ['as' => 'admin.experiencias.restore', 'uses' => 'ExperiencesController@restore']);

	/** USERS */
	Route::resource('usuarios', 'UsersController', ['except' => 'show']);
	Route::post('/usuarios/{id}', ['as' => 'admin.usuarios.restore', 'uses' => 'UsersController@restore']);

	/** Settings */
	Route::get('configuracion', ['as' => 'admin.settings.index', 'uses' => 'SettingsController@index']);

});
