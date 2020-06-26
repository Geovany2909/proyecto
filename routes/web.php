<?php

use App\Http\Controllers\productsController;

Route::get('/', function () {
    return view('welcome');
});

//ruta que sirve para ver la informacion del usuario logeado
Route::get('admin/users/showInfo', function () {
    return view('admin.users.showInfo');
})->name('info')->middleware('auth');

Auth::routes();
Route::get('admin/home', 'HomeController@index')->name('home');

Route::resources([
    'admin/products' => 'productsController',
    'admin/users' => 'usersController'
]);
