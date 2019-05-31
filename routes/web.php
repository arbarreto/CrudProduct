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

Route::get('/', function () {
    return redirect('/list');
});

Route::get('/list', 'ProductsController@listProduct')->name('list');
Route::get('/new', 'ProductsController@newProduct')->name('new');
Route::post('/create', 'ProductsController@createProduct')->name('create');
Route::get('/delete/{id}', 'ProductsController@deleteProduct')->name('delete');
Route::get('/edit/{id}', 'ProductsController@editProduct')->name('edit');
Route::post('/update/{id}', 'ProductsController@updateProduct')->name('update');
