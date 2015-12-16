<?php
Route::get('/', function(){
	return view('pages.main');
});
Route::get('/wheel', ['uses'=>'ListController@wheel', 'as'=>'wheel']);
Route::get('/disk', function(){
	return view('pages.disk');
});
Route::get('/tire', function(){
	return view('pages.tire');
});
Route::get('/other', function(){
	return view('pages.other');
});


/*Route::controllers([
	'/auth' => 'Auth\AuthController',
	'/password' => 'Auth\PasswordController',
]);*/
