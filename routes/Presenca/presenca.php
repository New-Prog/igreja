<?php

Route::group(['prefix' => 'presencas'], function () {
	Route::get('', 'PresencaViewController@allPresencas')->name('allPresencas'); 
	Route::get('/alt/{id}', 'PresencaViewController@getListaPresenca')->name('getListaPresenca');
	Route::get('/{id}', 'PresencaViewController@getPresenca')->name('getPresenca'); 
	Route::post('', 'PresencaViewController@savePresenca')->name('savePresenca'); 
	Route::post('/up/', 'PresencaViewController@updatePresenca')->name('updatePresenca'); 
});