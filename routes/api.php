<?php


Route::group(['middleware' => 'cors'], function() {
 
	Route::post('login' , 'AuthController@login');

	//Route::group(['middleware' => 'jwt.auth'], function() {

	    Route::group(['prefix' => 'membros'], function () {
	        Route::get('', 'MembroController@allMembros'); // Get all members
	        Route::get('/liders', 'MembroController@allLiders'); // Get all members
	        Route::get('/{id}', 'MembroController@getMembro'); // Get member specific
	        Route::post('', 'MembroController@saveMembro'); // save member
	        Route::post('/up/{id}', 'MembroController@updateMembro'); // update member     
	        Route::get('/del/{id}', 'MembroController@deleteMembro'); // update member     
	    });
	    
	    Route::group(['prefix' => 'celulas'], function () {
	        Route::get('', 'CelulaController@allCelulas'); // Get all celulas
	        Route::get('/{id}', 'CelulaController@getCelula'); // Get celula specific
	        Route::get('/soCelula/{id}', 'CelulaController@getSoCelula'); // Get celula specific
	        Route::post('', 'CelulaController@saveCelula'); // save celula
	        Route::post('/up/{id}', 'CelulaController@updateCelula'); // update celula     
	        Route::get('/del/{id}', 'CelulaController@deleteCelula'); // update member     
	
	    });
	    
	    Route::group(['prefix' => 'reunioes'], function () {
	        Route::get('', 'ReuniaoController@allReunioes'); // Get all reunioes
	        Route::get('/{id}', 'ReuniaoController@getReuniao'); // Get Reuniao specific
	        Route::post('', 'ReuniaoController@saveReuniao'); // save Reuniao
	        Route::post('/up/{id}', 'ReuniaoController@updateReuniao'); // update Reuniao     
	        Route::get('/del/{id}', 'ReuniaoController@deleteReuniao'); // update member     
	    });
	    
	    Route::group(['prefix' => 'presencas'], function () {
	        Route::get('', 'PresencaController@allPresencas'); // Get all reunioes
	        Route::get('/{id}', 'PresencaController@getPresenca'); // Get Presenca specific
	        Route::post('', 'PresencaController@savePresenca'); // save Presenca
	        Route::post('/up/{id}', 'PresencaController@updatePresenca'); // update Reuniao     
	        Route::get('/del/{id}', 'PresencaController@deletePresenca'); // update member     
	    });
	    
    	Route::group(['prefix' => 'posts'], function () {
    		Route::get('/cadastrar', 'PostViewController@viewPosts')->name('viewPost'); // Abrir tela retornando a view
    	
    		Route::post('/cadastrar/save', 'PostViewController@savePost')->name('savePost'); //
    	
    		Route::get('/consultar', 'PostController@allPosts');
    	
    		Route::get('/alterar/{id}', 'PostViewController@alterarPosts')->name('alterarPosts'); //
    	
    		Route::post('/up/{id}', 'PostViewController@updatePost')->name('updatePost'); // update member
    	
    		Route::get('/del/{id}', 'PostViewController@deletePost')->name('deletePost'); // update member
    	});

	//});
    		Route::group(['prefix' => 'teste'], function () {
    			Route::get('/getLocation', 'TesteController@getCordinates')->name('viewPost'); // Abrir tela retornando a view

    		});

});