<?php

Route::group(['prefix'=>'users'],function(){
    Route::put('{user}','WebApi\\UserController@update');
    Route::delete('{user}','WebApi\\UserController@destroy');
    Route::post('{user}/update-password','WebApi\\UserController@updatePassword');
    Route::post('{user}/refresh-token','WebApi\\UserController@refreshToken');

    Route::group(['prefix'=>'{user}/projects'],function(){
        Route::get('/', 'WebApi\\ProjectController@dataTable');
        Route::post('/','WebApi\\ProjectController@store');
    });
});

Route::group(['prefix'=>'projects'],function(){
    Route::put('{project}','WebApi\\ProjectController@update');
    Route::delete('{project}','WebApi\\ProjectController@destroy');
    Route::post('{project}/refresh-token','WebApi\\ProjectController@refreshToken');
    Route::group(['prefix'=>'{project}/images'],function(){
        Route::get('/','WebApi\\ImageController@index');
        Route::post('/','WebApi\\ImageController@store');
    });
});

Route::group(['prefix'=>'images'],function(){
    Route::delete('{image}', 'WebApi\\ImageController@destroy');
});
