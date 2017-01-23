<?php

Route::group(['prefix' => 'wishes', 'roles' => array_keys(trans('globals.roles')), 'middleware' => ['auth', 'roles']], function () {

    //create
    Route::get('/create', ['uses' => 'OrdersController@createWishList', 'as' => 'orders.create_wish_list']);

    //add into a specific wish list by id
    Route::get('/{id}/products', ['uses' => 'OrdersController@showWishList', 'as' => 'orders.show_wish_list_by_id']);

    //list
    Route::get('/', ['uses' => 'OrdersController@showWishList', 'as' => 'orders.show_wish_list']);

    //shop
    Route::get('shop','OrdersController@showWishShop');

    //shop add
    Route::get('shop/attention/add','OrdersController@attentionShopAdd');

    //shop del
    Route::get('shop/attention/del','OrdersController@attentionShopDel');

    //user directory
    Route::get('/directory', ['uses' => 'OrdersController@wishListDirectory', 'as' => 'orders.show_list_directory']);

    //store
    Route::post('/store', ['uses' => 'OrdersController@storeWishList', 'as' => 'orders.store_list']);
});
