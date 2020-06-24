<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\productsController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/users/showInfo', function () {
    return view('admin.users.showInfo');
})->name('info');
Route::get('admin/products/{$id}', 'productsController@destroy')->name('delete');
Auth::routes();
Route::get('admin/home', 'HomeController@index')->name('home');
Route::resource('admin/products', 'productsController');
