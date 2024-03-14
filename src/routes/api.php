<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to Micro Service Boilerplatesss!'
    ]);
});

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    Route::group(['prefix' => 'items'], function () {
        Route::post('/store', 'ItemController@storeItems');
    });
    Route::group(['prefix' => 'employee'], function () {
        Route::post('/store', 'EmployeeController@storeEmployee');
        Route::get('/list', 'EmployeeController@getEmployee');
        Route::get('/{employeeId}/show', 'EmployeeController@showEmployee');
        Route::delete('/{employeeId}/delete', 'EmployeeController@deleteEmployee');
        Route::patch('/{employeeId}/update', 'EmployeeController@updateEmployee');
        Route::get('/paginate', 'EmployeeController@paginateEmployee');
    });
});
