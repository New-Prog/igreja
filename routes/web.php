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
    Route::get('/cadastrar', 'MembroViewController@viewMembro')->name('viewCadastrar'); // Get all members
    Route::post('/cadastrar/salvar', 'MembroViewController@saveMembro')->name('saveMembro'); // save member
    Route::get('/consultar', 'MembroViewController@allMembros')->name('allMembros'); // Get all members
    Route::get('/alterar/{id}', 'MembroViewController@alterarMembro')->name('alterarMembro'); // Get all members
    Route::post('/up/{id}', 'MembroViewController@updateMembro')->name('updateMembro'); // update member
});
//*****************//
//* FIM - MEMBROS *//
//*****************//

//*****************//
//* INI - CELULAS *//
//*****************//
Route::group(['prefix' => 'celulas'], function () {
    Route::get('/cadastrar' , 'CelulaViewController@viewCelula')->name('viewCelula');
    Route::post('/cadastrar/save', 'CelulaViewController@saveCelula')->name('saveCelula'); // save member
    Route::get('/consultar', 'CelulaViewController@allCelulas')->name('allCelulas'); // Get all members
    Route::get('/alterar/{id}', 'CelulaViewController@alterarMembro')->name('alterarMembro'); // Get all members
    Route::post('/up/{id}', 'CelulaViewController@updateMembro')->name('updateMembro'); // update member     
    Route::post('/del/{id}', 'CelulaViewController@deleteMembro')->name('deleteMembro'); // update member     
});
//*****************//
//* FIM - CELULAS *//
//*****************//

//*****************//
//* INI  - REUNIOES *//
//*****************//
Route::group(['prefix' => 'reunioes'], function () {
    Route::get('/cadastrar', 'ReuniaoViewController@viewReuniao')->name('viewReuniao'); // Abrir tela retornando a view
    Route::post('/cadastrar/save', 'ReuniaoViewController@saveReuniao')->name('saveReuniao'); // 
    Route::get('/consultar', 'ReuniaoViewController@allReunioes')->name('allReunioes'); // Abrir tela retornando a view
    Route::post('/alterar/{id}', 'ReuniaoViewController@alterarReuniao')->name('alterarReuniao'); // 
    Route::post('/up/{id}', 'ReuniaoViewController@updateReuniao')->name('updateMembro'); // update member     
    Route::post('/del/{id}', 'ReuniaoViewController@deleteReuniao')->name('deleteMembro'); // update member     
});

//*****************//
//* FIM  - REUNIOES *//
//*****************//
Route::group(['prefix' => 'posts'], function () {
    Route::get('/cadastrar', 'PostViewController@viewPost')->name('viewPost'); // Abrir tela retornando a view
    Route::post('/cadastrar/save', 'PostViewController@savePost')->name('savePost'); // 
    Route::get('/consultar', 'PostViewController@allPosts')->name('allPosts'); // Abrir tela retornando a view
    Route::post('/alterar/{id}', 'PostViewController@alterarPosts')->name('alterarPosts'); // 
    Route::post('/up/{id}', 'PostViewController@updatePost')->name('updatePost'); // update member   
    Route::post('/del/{id}', 'PostViewController@deletePost')->name('deletePost'); // update member      
});
