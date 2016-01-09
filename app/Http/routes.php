<?php
Route::get('/',  ['uses'=>'ListController@showMain', 'as'=>'main']);
Route::get('/home',  ['uses'=>'ListController@showMain', 'as'=>'home']);
Route::get('/wheel', ['uses'=>'ListController@showWheel', 'as'=>'wheel']);
Route::get('/disk', ['uses'=>'ListController@showDisk', 'as'=>'disk']);
Route::get('/tire', ['uses'=>'ListController@showTire', 'as'=>'tire']);
Route::get('/other', ['uses'=>'ListController@showOther', 'as'=>'other']);
Route::get('/shoppingCart', ['uses'=>'ShoppingCartController@showCart', 'as'=>'showCart']);
Route::get('/admin', ['uses'=>'AdminController@index', 'middleware' => 'isAdmin', 'as'=>'admin']);

Route::get('/addToCart',  'ShoppingCartController@showCart');

Route::post('deleteItemOnCart', 'ShoppingCartController@deleteItemOnCart');
Route::post('addToCart', 'ShoppingCartController@addToCart');
Route::post('countCart', 'ShoppingCartController@countCartAjax');
Route::post('/admin/addItem', ['uses'=>'AdminController@addItem', 'middleware' => 'isAdmin', 'as'=>'addItem']);
Route::post('/admin/changeItem',  ['uses'=>'AdminController@changeItem', 'middleware' => 'isAdmin', 'as'=>'changeItem']);


Route::get('/{type}/{id}', ['uses' => 'ItemController@showItem', 'middleware' => 'RedirectAdmin'])->where(['id' => '[0-9]+', 'type' => '^(tire|wheel|disk)$']);;
Route::get('/{title}', 'InfoPageController@index')->where(['title' => '^(contacts|delivery|return|warranty)$']);;

Route::get('/admin/{type}/{id}', ['middleware' => 'isAdmin', 'uses' => 'ItemController@adminShowItem'])->where(['id' => '[0-9]+', 'type' => '^(tire|wheel|disk)$']);;


Route::controllers([
	'/auth' => 'Auth\AuthController',
	'/password' => 'Auth\PasswordController',
]);

