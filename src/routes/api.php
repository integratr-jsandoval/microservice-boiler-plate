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
        //
        Route::get('/{itemId}', 'ItemController@items');
    });
});

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    Route::group(['prefix' => 'employees'], function () {
        //
        Route::post('/store', 'employeeController@storeEmployee');
        Route::get('/list', 'employeeController@getEmployee');
        Route::get('/{employeeId}/show', 'employeeController@showEmployee');
        Route::delete('/{employeeId}/delete', 'employeeController@deleteEmployee');
        Route::patch('/{employeeId}/update', 'employeeController@updateEmployee');
        Route::get('/paginate', 'employeeController@paginateEmployee');
    });
});

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    Route::group(['prefix' => 'departments'], function () {
        //
        Route::post('/store', 'DepartmentController@storeDepartment');
        Route::get('/list', 'DepartmentController@getDepartment');
        Route::get('/{deptId}/show', 'departmentController@showDepartment');
        Route::delete('/{deptId}/delete', 'departmentController@deleteDepartment');
        Route::patch('/{deptId}/update', 'departmentController@updateDepartment');
    });
});

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    Route::group(['prefix' => 'title'], function () {
        Route::post('/store', 'TitleController@storeTitle');
        Route::get('/list', 'TitleController@getTitle');
        Route::get('/{titleId}/show', 'TitleController@showTitle');
        Route::delete('/{titleId}/delete', 'TitleController@deleteTitle');
        Route::patch('/{titleId}/update', 'TitleController@updateTitle');
    });
});
