<?php

Route::get('pruebas', function () {

});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('user/profile/{user}', 'UserController@editProfile')->name('user.edit.profile');;
Route::patch('user/profile/{user}', 'UserController@updateProfile')->name('user.update.profile');;

Route::resource('configurations', 'ConfigurationController');
Route::resource('rols', 'RolController');
Route::resource('users', 'UserController');

Route::get('user/{user}/menu', 'UserController@menu')->name('user.menu');;
Route::patch('user/menu/{user}', 'UserController@menuStore')->name('users.menuStore');

Route::get('option/create/{padre}', 'OptionMenuController@create')->name('admin.option.create');
//    Route::get('option/orden', 'OptionMenuController@updateOrden')->name('option.order');
Route::get('option/orden', 'OptionMenuController@updateOrden')->name('option.order.store');
Route::resource('options',"OptionMenuController");

Route::get('oauth/client',"UserController@adminOauthClient")->name('oauth.clients');


Route::get('prueba/pdf', function (\App\Extensiones\Fpdf $fpdf) {
    $fpdf->AddPage();
    $fpdf->SetFont('Courier', 'B', 18);
    $fpdf->Cell(50, 25, 'Hello World!');
    $fpdf->Output();
    exit();
})->name('prueba.pdf');

Route::resource('permissions', 'PermissionController');