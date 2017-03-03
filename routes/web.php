<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'membros'], function () {
    Route::get('/cadastrar', function(){
			return view('membros_cadastrar');
		}); // Get all members

    Route::post('/cadastrar/salvar', 'MembroViewController@saveMembro'); // save member
    Route::get('/consultar', 'MembroViewController@allMembros'); // Get all members
    Route::get('/alterar/{id}', 'MembroViewController@alterarMembro'); // Get all members
    Route::post('/up/{id}', 'MembroViewController@updateMembro'); // update member

    // Route::get('/{id}', 'MembroViewController@getMembro'); // Get member specific
});


Route::get('/login', 'HomeController@index');

Route::get('/', function () {
    return view('principal');
});
Auth::routes();
Route::auth();

Route::get('/listarMembros', 'MembroController@listar');

//Route::get('/getLead', 'LeadController@getLeads');
//Route::post('/lead', 'LeadController@store');
//Route::get('/CadastrarMembros', 'MembrosController@cadastrar');
//Route::get('/membros', 'MembroController@index');
//Route::get('/home', 'PostController@VemNiMimView');

Route::post('/membros/save', 'MembroController@store');
Route::post('/membros/update', 'MembroController@update');




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

Route::get('/dashboard', function() {
		return view('dashboard');
});

Route::get('/forgot', function() {
		return view('auth/passwords/email');
});

Route::get('/dashboard', function() {
		return view('dashboard');
});

Route::get('/membros/cadastrar', 'DashboardController@teste');

Route::get('/celulas/consultar', function() {
		return view('celulas_consultar');
});

Route::get('/celulas/cadastrar', function() {
		return view('celulas_cadastrar');
	});

Route::get('/reunioes/cadastrar', function() {
		return view('reunioes_cadastrar');
});

Route::get('/reunioes/cadastrar', function() {
		return view('reunioes_cadastrar');
});