<?php
Route::get('/',  ['uses'=>'ListController@showMain', 'as'=>'main']);
Route::get('/wheel', ['uses'=>'ListController@showWheel', 'as'=>'wheel']);
Route::get('/disk', ['uses'=>'ListController@showDisk', 'as'=>'disk']);
Route::get('/tire', ['uses'=>'ListController@showTire', 'as'=>'tire']);
Route::get('/other', ['uses'=>'ListController@showOther', 'as'=>'other']);
Route::get('/shoppingCart', ['uses'=>'ShoppingCartController@shoppingCart', 'as'=>'shoppingCart']);
Route::post('/addToCart', function(){
    dd(\Illuminate\Http\Request::ajax());
});
Route::post('addToCart', 'ShoppingCartController@addToCart');

/*Route::resourse('Cart', 'ShoppingCartController');*/
Route::get('/{type}/{id}', 'ItemController@showItem')->where(['id' => '[0-9]+', 'type' => '^(tire|wheel|disk)$']);;

/*Route::controllers([shoppingCart
	'/auth' => 'Auth\AuthController',
	'/password' => 'Auth\PasswordController',
]);*/
