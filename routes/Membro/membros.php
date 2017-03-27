<?php

Route::group(['prefix' => 'membros'], function () {
	Route::get('/cadastrar', 'MembroViewController@viewMembro')->name('viewCadastrar'); // Get all members
	Route::get('/consultar', 'MembroViewController@allMembros')->name('allMembros'); // Get all members
	Route::get('/alterar/{id}', 'MembroViewController@alterarMembro')->name('alterarMembro'); // Get all members
	Route::post('/cadastrar/salvar', 'MembroViewController@saveMembro')->name('saveMembro'); // save member
	Route::post('/up/{id}', 'MembroViewController@updateMembro')->name('updateMembro'); // update member
	Route::get('/del/{id}', 'MembroViewController@deleteMembro')->name('deleteMembro'); // update member
	Route::post('/getEspecifico', 'MembroViewController@getMembroEspecifico')->name('getMembroEspecifico'); // update member
});