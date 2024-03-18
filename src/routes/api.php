<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to Micro Service Boilerplate!'
    ]);
});
//<<<<<<< Updated upstream
//=======

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    Route::group(['prefix' => 'items'], function () {
        //
        route::post('/store', 'ItemController@storeItem');
        route::patch('/{itemid}/update', 'ItemController@updateItem');
        route::delete('/{itemid}/delete', 'ItemController@deleteItem');
        route::get('/{itemid}/show', 'ItemController@showItem');
        route::get('/list', 'ItemController@getItem');
    });

    Route::group(['prefix' => 'stocks'], function () {
        //
        route::post('/store', 'StockController@storeStock');
        route::patch('/{stockid}/update', 'StockController@updateStock');
        route::delete('/{stockid}/delete', 'StockController@deleteStock');
        route::get('/{stockid}/show', 'StockController@showStock');
        route::get('/list', 'StockController@getStock');
    });

    Route::group(['prefix' => 'employees'], function () {
        route::post('/store', 'EmployeeController@storeEmployee');
        route::get('/list', 'EmployeeController@getEmployee');
        route::get('/{employeeId}/show', 'EmployeeController@showEmployee');
        route::delete('/{employeeId}/delete', 'EmployeeController@deleteEmployee');
        route::patch('/{employeeId}/update', 'EmployeeController@updateEmployee');
        route::get('/paginate', 'EmployeeController@paginateEmployee');
    });

    Route::group(['prefix' => 'departments'], function () {
        route::post('/store', 'DepartmentController@storeDepartment');
        route::get('/list', 'DepartmentController@getDepartment');
        route::get('/{deptId}/show', 'DepartmentController@showDepartment');
        route::delete('/{deptId}/delete', 'DepartmentController@deleteDepartment');
        route::patch('/{deptId}/update', 'DepartmentController@updateDepartment');
    });

    Route::group(['prefix' => 'titles'], function () {
        route::post('/store', 'TitleController@storeTitle');
        route::get('/list', 'TitleController@getTitle');
        route::get('/{titleid}/show', 'TitleController@showTitle');
        route::delete('/{titleid}/delete', 'TitleController@deleteTitle');
        route::patch('/{titleid}/update', 'TitleController@updateTitle');
    });
});
//>>>>>>> Stashed changes
