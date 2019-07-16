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

// // Download Route
// Route::get('about/{filename}', function($filename)
// {
//     // Check if file exists in app/storage/file folder
//     $file_path = storage_path() .'/Document5/'. $filename;
//     if (file_exists($file_path))
//     {
//         // Send Download
//         return Response::download($file_path, $filename, [
//             'Content-Length: '. filesize($file_path)
//         ]);
//     }
//     else
//     {
//         // Error
//         exit('Requested file does not exist on our server!');
//     }
// })
// ->where('filename', '[A-Za-z0-9\-\_\.]+');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/tutorial', function () {
    return view('tutorial');
});

Auth::routes();

Route::resources([
    '/home' => 'DocumentController',
]);

Route::resource('/project_status', 'ChangeStatusProjectController');

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












