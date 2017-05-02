<?php

Route::group(['prefix' => 'posts'], function () {
	Route::get('/cadastrar', 'PostViewController@viewPosts')->name('viewPost'); // Abrir tela retornando a view

	Route::post('/cadastrar/save', 'PostViewController@savePost')->name('savePost'); //
	
	Route::get('/consultar', 'PostViewController@allPosts')->name('allPosts'); // Abrir tela retornando a view
	
	Route::get('/alterar/{id}', 'PostViewController@alterarPosts')->name('alterarPosts'); //
	
	Route::post('/up/{id}', 'PostViewController@updatePost')->name('updatePost'); // update member
	
	Route::get('/del/{id}', 'PostViewController@deletePost')->name('deletePost'); // update member
});