<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to Micro Service Boilerplate!'
    ]);
});


Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    Route::group(['prefix' => 'items'], function () {
        route::post('/store', 'ItemController@storeItem');
        route::patch('/{itemid}/update', 'ItemController@updateItem');
        route::delete('/{itemid}/delete', 'ItemController@deleteItem');
        route::get('/{itemid}/show', 'ItemController@showItem');
        route::get('/list', 'ItemController@getItem');
        route::get('search/{name}', 'ItemController@searchItem');
    });

    Route::group(['prefix' => 'stocks'], function () {
        route::post('/store', 'StockController@storeStock');
        route::patch('/{stockid}/update', 'StockController@updateStock');
        route::delete('/{stockid}/delete', 'StockController@deleteStock');
        route::get('/{stockid}/show', 'StockController@showStock');
        route::get('/list', 'StockController@getStock');
    });
});
