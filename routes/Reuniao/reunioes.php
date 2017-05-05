<?php

Route::group(['prefix' => 'reunioes'], function () {
	Route::get('/cadastrar', 'ReuniaoViewController@viewReuniao')->name('viewReuniao'); // Abrir tela retornando a view
	
	Route::post('/cadastrar/save', 'ReuniaoViewController@saveReuniao')->name('saveReuniao'); //
	Route::get('/consultar', 'ReuniaoViewController@allReunioes')->name('allReunioes'); // Abrir tela retornando a view
	Route::get('/alterar/{id}', 'ReuniaoViewController@alterarReuniao')->name('alterarReuniao'); //
	Route::post('/up/{id}', 'ReuniaoViewController@updateReuniao')->name('updateReuniao'); // update member
	Route::get('/del/{id}', 'ReuniaoViewController@deleteReuniao')->name('deleteReuniao'); // update member
	Route::post('/getEspecifico', 'ReuniaoViewController@getReuniaoEspecifico')->name('getReuniaoEspecifico'); // 

	Route::get('/mapa', 'ReuniaoViewController@getInfosMapa'); 

	
});

