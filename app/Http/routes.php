<?php
Route::get('/',  ['uses'=>'ListController@main', 'as'=>'main']);
Route::get('/wheel', ['uses'=>'ListController@wheel', 'as'=>'wheel']);
Route::get('/disk', ['uses'=>'ListController@disk', 'as'=>'disk']);
Route::get('/tire', ['uses'=>'ListController@tire', 'as'=>'tire']);
Route::get('/other', ['uses'=>'ListController@other', 'as'=>'other']);
Route::get('/{type}/{id}', 'ItemController@showItem')->where(['id' => '[0-9]+', 'type' => '^(tire|wheel|disk)$']);;

/*Route::controllers([
	'/auth' => 'Auth\AuthController',
	'/password' => 'Auth\PasswordController',
]);*/
