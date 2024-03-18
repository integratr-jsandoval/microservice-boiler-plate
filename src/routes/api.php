<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to Micro Service Boilerplate!'
    ]);
});

<<<<<<< HEAD
=======

>>>>>>> 90174a0d37ce80d94d695288c09760ab47b61244
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
<<<<<<< HEAD
    Route::group(['prefix' => 'authors'], function () {
        //
        Route::post('/store', 'AuthorController@storeAuthor');
        Route::get('/list', 'AuthorController@getAuthor');
        Route::get('/{authorId}/show', 'AuthorController@showAuthor');
        Route::delete('/{authorId}/delete', 'AuthorController@deleteAuthor');
        Route::patch('/{authorId}/update', 'AuthorController@updateAuthor');
    });
    
    Route::group(['prefix' => 'books'], function () {
        //
        Route::post('/store', 'BookController@storeBook');
        Route::get('/list', 'BookController@getBook');
        Route::get('/{bookId}/show', 'BookController@showBook');
        Route::delete('/{bookId}/delete', 'BookController@deleteBook');
        Route::patch('/{bookId}/update', 'BookController@updateBook');
    });

});
=======
    Route::group(['prefix' => 'items'], function () {
        route::post('/store', 'ItemController@storeItem');
        route::patch('/{itemid}/update', 'ItemController@updateItem');
        route::delete('/{itemid}/delete', 'ItemController@deleteItem');
        route::get('/{itemid}/show', 'ItemController@showItem');
        route::get('/list', 'ItemController@getItem');
    });

    Route::group(['prefix' => 'stocks'], function () {
        route::post('/store', 'StockController@storeStock');
        route::patch('/{stockid}/update', 'StockController@updateStock');
        route::delete('/{stockid}/delete', 'StockController@deleteStock');
        route::get('/{stockid}/show', 'StockController@showStock');
        route::get('/list', 'StockController@getStock');
    });
});
>>>>>>> 90174a0d37ce80d94d695288c09760ab47b61244
