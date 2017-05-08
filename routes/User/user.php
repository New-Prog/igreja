<?php

Route::get('/logout', function() {
	Auth::logout();
	return view('principal');
});

Route::get('/forgot', function() {
	return view('auth/passwords/email');
});

Route::get('/dashboard', 'DashboardController@home'); 
