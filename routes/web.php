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




Route::get('/api/membros', 'MembroController@allMembros'); // Get all members
Route::get('/api/membros/{id}', 'MembroController@getMembro'); // Get member specific
Route::get('/api/membros/app/{id}', 'MembroController@getMembrosByLider'); // Get members by leader
Route::post('/api/membros', 'MembroController@saveMembro'); // save member
Route::post('/api/membros/up/{id}', 'MembroController@updateMembro'); // update member     
Route::post('/api/membros/del/{id}', 'MembroController@deleteMembro'); // delete member
