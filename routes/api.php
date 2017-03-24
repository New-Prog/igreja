<?php
Route::group(['middleware' => 'cors'], function() {
 
    Route::group(['prefix' => 'membros'], function () {
        Route::get('', 'MembroController@allMembros'); // Get all members
        Route::get('/liders', 'MembroController@allLiders'); // Get all members
        Route::get('/{id}', 'MembroController@getMembro'); // Get member specific
        Route::post('', 'MembroController@saveMembro'); // save member
        Route::post('/up/{id}', 'MembroController@updateMembro'); // update member     
    });
    
    Route::group(['prefix' => 'celulas'], function () {
        Route::get('', 'CelulaController@allCelulas'); // Get all celulas
        Route::get('/{id}', 'CelulaController@getCelula'); // Get celula specific
        Route::post('', 'CelulaController@saveCelula'); // save celula
        Route::post('/up/{id}', 'CelulaController@updateCelula'); // update celula     
        Route::post('/del/{id}', 'CelulaController@deleteMembro'); // update member     
    });
    
    Route::group(['prefix' => 'reunioes'], function () {
        Route::get('', 'ReuniaoController@allReunioes'); // Get all reunioes
        Route::get('/{id}', 'ReuniaoController@getReuniao'); // Get Reuniao specific
        Route::post('', 'ReuniaoController@saveReuniao'); // save Reuniao
        Route::post('/up/{id}', 'ReuniaoController@updateReuniao'); // update Reuniao     
    });
    
    Route::group(['prefix' => 'presencas'], function () {
        Route::get('', 'PresencaController@allPresencas'); // Get all reunioes
        Route::get('/{id}', 'PresencaController@getPresenca'); // Get Presenca specific
        Route::post('', 'PresencaController@savePresenca'); // save Presenca
        Route::post('/up/{id}', 'PresencaController@updatePresenca'); // update Reuniao     
    });
    
    Route::group(['prefix' => 'posts'], function () {
        Route::get('', 'PostController@allPosts'); // Get all reunioes
        Route::get('/{id}', 'PostController@getPost'); // Get Post specific
        Route::post('', 'PostController@savePost'); // save Post
        Route::post('/up/{id}', 'PostController@updatePost'); // update Post     
    });    
});