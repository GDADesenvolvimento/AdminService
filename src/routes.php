<?php
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/services', ['as' => 'services', 'uses' => '\GdaDesenv\AdminService\Controllers\ServiceController@index']);
    Route::get('/service/form', ['as' => 'service.form', 'uses' => '\GdaDesenv\AdminService\Controllers\ServiceController@form']);
    Route::post('/service/create', ['as' => 'service.create', 'uses' => '\GdaDesenv\AdminService\Controllers\ServiceController@create']);
    Route::get('/service/edit/{id}', ['as' => 'service.edit', 'uses' => '\GdaDesenv\AdminService\Controllers\ServiceController@edit']);
    Route::put('/service/put', ['as' => 'service.update', 'uses' => '\GdaDesenv\AdminService\Controllers\ServiceController@update']);
    Route::get('/service/delete/{id}', ['as' => 'service.delete', 'uses' => '\GdaDesenv\AdminService\Controllers\ServiceController@delete']);
});