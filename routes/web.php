<?php

Route::get('/dashboard', function() {
	return view('dashboard');
});

foreach (glob(__DIR__ . '/*/*.php') as $file) {
	require $file;
}
Route::auth();
Auth::routes();