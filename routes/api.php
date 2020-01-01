<?php

use Illuminate\Http\Request;


Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::post('/sign-in', 'SignInController');
    Route::post('/sign-up', 'SignUpController');
    Route::post('/sign-out', 'SignOutController');
    Route::any('/me', 'MeController');
});

Route::group(['namespace' => 'API'], function () {
    Route::get('/products', 'ProductController');
    Route::get('/user-history', 'UserController');
    Route::post('/order', 'OrderController@index');
    Route::post('/order/{id}', 'OrderController@get_order')->where('id', '[0-9]+');;
    Route::any('/delivery-fee', 'FeeController');
});


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
