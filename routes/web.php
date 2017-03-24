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
//**********************//
//* INI - TELA INICIAL *//
//**********************//
Route::get('/login', 'HomeController@index');
Route::get('/logout', function() {
    Auth::logout();
    return view('principal');
});
Route::get('/forgot', function() {
    return view('auth/passwords/email');
});
Route::get('/', function () {
    return view('principal');
});
Auth::routes();
Route::auth();
//**********************//
//* FIM - TELA INICIAL *//
//**********************//
//********************//
//* INI - DASHBOARD *//
//*******************//
Route::get('/dashboard', function() {
    return view('dashboard');
});
//********************//
//* FIM - DASHBOARD *//
//*******************//

//*****************//
//* INI - MEMBROS *//
//*****************//
Route::group(['prefix' => 'membros'], function () {
    Route::get('/cadastrar', function(){
		return view('membros_cadastrar')->renderSections()['conteudo'];
	}); 
    Route::post('/cadastrar/salvar', 'MembroViewController@saveMembro'); // save member
    Route::get('/consultar', 'MembroViewController@allMembros'); // Get all members
    Route::get('/alterar/{id}', 'MembroViewController@alterarMembro'); // Get all members
    Route::post('/up/{id}', 'MembroViewController@updateMembro'); // update member
});
//*****************//
//* FIM - MEMBROS *//
//*****************//

//*****************//
//* INI - CELULAS *//
//*****************//
Route::group(['prefix' => 'celulas'], function () {

    Route::get('/cadastrar', function() { 
		return view('celulas_cadastrar')->renderSections()['conteudo'];
    }); 
    Route::post('/cadastrar/save', 'CelulaViewController@saveCelula'); // save member
    Route::get('/consultar', 'CelulaViewController@allCelulas')->name('allCelulas'); // Get all members
    Route::get('/alterar/{id}', 'CelulaViewController@alterarMembro'); // Get all members
    Route::post('/up/{id}', 'CelulaViewController@updateMembro'); // update member     
    Route::post('/del/{id}', 'CelulaViewController@deleteMembro'); // update member     
});
//*****************//
//* FIM - CELULAS *//
//*****************//

//*****************//
//* INI  - REUNIOES *//
//*****************//
Route::group(['prefix' => 'reunioes'], function () {
    Route::get('/cadastrar', function() { 
        return view('reunioes_cadastrar')->renderSections()['conteudo'];
    }); 

    Route::get('/consultar', 'ReuniaoViewController@allReunioes'); // Abrir tela retornando a view
    Route::post('/cadastrar/save', 'ReuniaoViewController@saveReuniao'); // 
    Route::post('/alterar/{id}', 'ReuniaoViewController@alterarReuniao'); // 
});

//*****************//
//* FIM  - REUNIOES *//
//*****************//
Route::group(['prefix' => 'posts'], function () {
    Route::get('/cadastrar', function() { 
        return view('posts_cadastrar')->renderSections()['conteudo'];
    }); 
    Route::get('/consultar', 'PostViewController@viewPosts'); // Abrir tela retornando a view
    Route::post('/cadastrar/save', 'PostViewController@savePost'); // 
    Route::post('/alterar/{id}', 'PostViewController@alterarPosts'); // 
});
