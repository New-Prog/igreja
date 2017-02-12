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


Route::get('/membros', 'MembroController@allMembros'); // Get all members
Route::get('/membros/{id}', 'MembroController@getMembro'); // Get member specific
Route::get('/membros/app/{id}', 'MembroController@getMembrosByLider'); // Get members by leader
Route::post('/membros', 'MembroController@saveMembro'); // save member
Route::post('/membros/up/{id}', 'MembroController@updateMembro'); // update member     
Route::post('/membros/del/{id}', 'MembroController@deleteMembro'); // delete member

