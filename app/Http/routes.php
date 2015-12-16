<?php
Route::get('/', function(){
	return view('pages.main');
});
Route::get('/wheel', ['uses'=>'ListController@wheel', 'as'=>'wheel']);
Route::get('/disk', ['uses'=>'ListController@disk', 'as'=>'disk']);
Route::get('/tire', ['uses'=>'ListController@tire', 'as'=>'tire']);
Route::get('/other', ['uses'=>'ListController@other', 'as'=>'other']);


/*Route::controllers([
	'/auth' => 'Auth\AuthController',
	'/password' => 'Auth\PasswordController',
]);*/
