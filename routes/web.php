<?php

use App\Http\Controllers\productsController;
use App\Product;

Route::get('/', function () {
    $product = Product::all();
    return view('mio', compact('product'));
})->name('root');
Route::get('/productos', function () {
    $product = Product::all();
    return view('productos', compact('product'));
})->name('productos');

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
