<?php



Route::group(['middleware' => 'auth:api'], function () {

    Route::resource('permissions', 'PermissionAPIController');

    Route::resource('roles', 'RoleAPIController');
});
