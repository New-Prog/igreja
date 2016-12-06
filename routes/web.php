<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/login', 'HomeController@index');

Route::get('/', function () {
    return view('principal');
});
Auth::routes();
Route::auth();

Route::get('/getLead', 'LeadController@getLeads');

Route::post('/lead', 'LeadController@store');

Route::get('/listarMembros', 'MembroController@listar');

#Route::get('/CadastrarMembros', 'MembrosController@cadastrar');


Route::get('/membros', 'MembroController@index');

Route::post('/membros/save', 'MembroController@store');

Route::post('/membros/update', 'MembroController@update');



Route::get('/home', 'PostController@VemNiMimView');

Route::post('/post', 'PostController@store');

Route::get('/logout', function() {
	Auth::logout();
	return view('principal');
});
