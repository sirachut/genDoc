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
    return view('welcome');
});

Auth::routes();

Route::resources([
    '/home' => 'DocumentController',
]);

Route::resource('/storemanage', 'StoreManageController');

Route::resource('/product','ProductController');

Route::resource('ajaxproducts','ProductAjaxController');

Route::get('/product/{$project_id}', 'ProductController@show');





