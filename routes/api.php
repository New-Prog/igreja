<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

//https://igreja-npjoao.c9users.io/api/membros

Route::group(['prefix' => 'membros'], function () {
    Route::get('', 'MembroController@allMembros'); // Get all members
    Route::get('/{id}', 'MembroController@getMembro'); // Get member specific
    Route::get('/app/{id}', 'MembroController@getMembrosByLider'); // Get members by leader
    Route::post('', 'MembroController@saveMembro'); // save member
    Route::post('/up/{id}', 'MembroController@updateMembro'); // update member     
    Route::post('/del/{id}', 'MembroController@deleteMembro'); // delete member
});


Route::group(['prefix' => 'celulas'], function () {
    Route::get('', 'CelulaController@allCelulas'); // Get all celulas
    Route::get('/{id}', 'CelulaController@getCelula'); // Get celula specific
    Route::get('/app/{id}', 'CelulaController@getCelulasByLider'); // Get celulas by leader
    Route::post('', 'CelulaController@saveCelula'); // save celula
    Route::post('/up/{id}', 'CelulaController@updateCelula'); // update celula     
    Route::post('/del/{id}', 'CelulaController@deleteCelula'); // delete celula
});

