<?php

use Illuminate\Http\Request;

//Auth Routes
Route::group(['prefix' => 'auth'], function(){
    Route::post('register', 'UserController@register');
    Route::get('activate/{token}', 'UserController@activateUser');
    Route::post('login', 'UserController@login');
    Route::post('forgot/password', 'ForgotPasswordController@store');
    Route::post('reset-password', 'ResetPasswordController@resetPassword');
});

Route::group(['middleware' => ['auth:api'],'prefix' => 'auth'], function(){
    Route::get('logout', 'UserController@logout');
});

//Admin Routes
Route::group(['middleware' => ['auth:api', 'is-admin'], 'prefix' => 'admin'], function(){
    //Admin register
    Route::post('register', 'Admin\AuthenticateController@register');

    //Report Type
    Route::group(['prefix' => 'report-type'], function(){
        Route::get('all', 'ReportTypeController@index');
        Route::get('show/{id}', 'ReportTypeController@show');
        Route::post('store', 'ReportTypeController@store');
        Route::delete('{id}', 'ReportTypeController@delete');
        Route::post('update/{id}', 'ReportTypeController@update');
    });

    //Brick
    Route::group(['prefix' => 'brick'], function(){
        Route::get('all', 'BrickController@index');
        Route::get('show/{id}', 'BrickController@show');
        Route::delete('delete/{id}', 'BrickController@delete');
        Route::put('update/{id}', 'BrickController@update');
    });

    //Manage user routes for admin
    Route::group(['prefix' => 'manage-user'], function(){
        Route::get('all', 'Admin\ManageUserController@index');
        Route::get('show/{id}', 'Admin\ManageUserController@show');
        Route::delete('delete/{id}', 'Admin\ManageUserController@delete');
        Route::post('register', 'Admin\ManageUserController@store');
        Route::post('update/{id}', 'Admin\ManageUserController@update');
        
    });

    //Order routes for admin
    Route::group(['prefix' => 'order'], function(){
        Route::get('all', 'Admin\OrderController@index');
        Route::post('update/{id}', 'Admin\OrderController@update');
        Route::delete('delete/{id}', 'Admin\OrderController@delete');
    });
});

//Customer Routes
Route::group(['middleware' => ['auth:api', 'is-customer']], function(){
    //Manage customer
    Route::group(['prefix' => 'manage-customer'], function(){
        Route::get('details', 'Customer\ManageCustomerController@show');
        Route::post('update', 'Customer\ManageCustomerController@update');
    });

    //Orders
    Route::group(['prefix' => 'order'], function(){
        Route::post('store', 'Customer\OrderController@store');
        Route::get('all', 'Customer\OrderController@index');
        Route::get('show/{id}', 'Customer\OrderController@show');
        Route::delete('delete/{id}', 'Customer\OrderController@delete');
        Route::post('update/{id}', 'Customer\OrderController@update');
    });
});

//Login routes only for admins
Route::group(['prefix' => 'admin'], function(){
    Route::post('login', 'Admin\AuthenticateController@login');
});

