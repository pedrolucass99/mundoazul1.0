<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::resource('/', 'ProjetoController');

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {

	Route::resource('profissional', 'ProfissionalController');

	Route::resource('responsavel', 'ResponsavelController');

	Route::resource('instituicao', 'InstituicaoController');

	Route::resource('forum', 'ForumController');

	Route::resource('coments/{id}', 'ComentarioController'); // Fórum

	Route::resource('coments', 'ComentarioController'); // Fórum
	
	Route::resource('criar/{id}' ,'EventoController'); // Evento

	Route::resource('projeto/{id}' ,'ProjetoController');

	Route::resource('mensagem/{id}', 'MensagemController');

	Route::resource('mensagem', 'MensagemController');
	
	//Route::get('coments/create/{id}', 'ComentarioController@create');
	
	//Route::resource('evento', 'EventoController');

/*------------------------------------------------------------*/

	Route::post('profissional/{id}' ,'ProfissionalController@update');

	Route::post('responsavel/{id}' ,'ResponsavelController@update');

	Route::post('instituicao/{id}' ,'InstituicaoController@update');

	Route::post('forum/{id}' ,'ForumController@update');

	Route::post('projeto/edite/{id}' ,'ProjetoController@update');

	Route::post('criar/edite/{id}' ,'EventoController@update');
/*------------------------------------------------------------*/

	//Route::resource('evento', 'EventoController');

	//Route::view('evento/create', 'evento/create');
	//Route::post('eventos/{id}' ,'EventoController@update');

});


