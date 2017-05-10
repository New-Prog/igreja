<?php 
Route::group(['middleware' => 'cors'], function() {

	Route::post('login' , 'AuthController@login');
    //Route::group(['middleware' => 'jwt.auth'], function() {

	    Route::group(['prefix' => 'membros'], function () {
	        Route::get('', 'MembroController@allMembros'); // Get all members
	        Route::get('/liders', 'MembroController@allLiders'); // Get all members
	        Route::get('/ultimos', 'MembroController@ultimos');
	        Route::get('/{id}', 'MembroController@getMembro'); // Get member specific
	        Route::get('/byCelula/{id}', 'MembroController@getMembroByCelulaAPI'); // Get member specific
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
	        Route::get('/byCelula/{id}', 'ReuniaoController@getReuniaoByCelula'); // save Reuniao
	        Route::post('/up/{id}', 'ReuniaoController@updateReuniao'); // update Reuniao     
	        Route::get('/del/{id}', 'ReuniaoController@deleteReuniao'); // update member     
	    });
	    
	    Route::group(['prefix' => 'presencas'], function () {
	        Route::get('', 'PresencaController@allPresencas'); // Get all reunioes
	        Route::get('/{id}', 'PresencaController@getPresenca'); // Get Presenca specific
	        Route::post('', 'PresencaController@savePresenca'); // save Presenca
	        Route::post('/up', 'PresencaController@updatePresenca'); // update Reuniao     
	    });
	    
    	Route::group(['prefix' => 'posts'], function () {

	        Route::get('', 'PostController@allPosts'); // 
	        Route::get('/{id}', 'PostController@getPost'); // 
	        Route::post('', 'PostController@savePost'); // 
	        Route::post('/up/{id}', 'PostController@updatePost'); // 
    	});
    	
    	Route::group(['prefix' => 'mensagem'], function () {
    		Route::post('', 'MensagemController@save'); //
    		Route::get('', 'MensagemController@list'); //    		
    	});

        Route::get('/dashboard/getdados', 'DashboardController@getDadosDashboard'); //    		

        Route::post('/usuario', 'LoginApiController@getUsuario'); //    		


	//});

});