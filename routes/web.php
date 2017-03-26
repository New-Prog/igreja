<?php
Route::get('/', function() {
	return view('principal');
});

foreach (glob(__DIR__ . '/*/*.php') as $file) {
	require $file;
}
Route::auth();
Auth::routes();