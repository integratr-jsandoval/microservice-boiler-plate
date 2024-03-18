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