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

Route::resource('ajaxproducts','ProductAjaxController');

Route::resource('/createstore','StoreController');

Route::resource('/director','DirectorController');

Route::resource('/usermanage', 'UserManageController');

Route::resource('/profile', 'ProfileController');

Route::resources([
    '/two' => 'Prints\TwoController',
    '/three' => 'Prints\ThreeController',
    '/four' => 'Prints\FourController',
    '/five' => 'Prints\FiveController',
    '/six' => 'Prints\SixController',
    'seven' => 'Prints\SevenController',
    'eight' => 'Prints\EightController'
]);












