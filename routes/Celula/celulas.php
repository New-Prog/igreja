<?php

Route::group(['prefix' => 'celulas'], function () {
	Route::get('/cadastrar' , 'CelulaViewController@viewCelula')->name('viewCelula');
	Route::get('/consultar', 'CelulaViewController@allCelulas')->name('allCelulas'); // Get all members
	Route::get('/alterar/{id}', 'CelulaViewController@alterarCelula')->name('alterarCelula'); // Get all member	Route::post('/up/{id}', 'CelulaViewController@updateCelula')->name('updateCelula'); // update member
	Route::post('/cadastrar/save', 'CelulaViewController@saveCelula')->name('saveCelula'); // save member
	Route::get('/consultar', 'CelulaViewController@allCelulas')->name('allCelulas'); // Get all members
	Route::post('/up/{id}', 'CelulaViewController@updateCelula')->name('updateCelula'); // update member
	Route::get('/del/{id}', 'CelulaViewController@deleteCelula')->name('deleteCelula'); // update member
});