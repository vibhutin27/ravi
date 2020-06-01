<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
   // $name =     request('name');
    //  return ($name);

    //below return as json data
    //return ['foo' => 'bar'];
    // Below return for print value in wabpage from URL
    //return view('welcome', ['name' => $name ]);
    return view('welcome');      
});



Route::get('/home', function () {
    return view('home');
});

Route:: get('/posts/{post}', 'PostController@show');
//Route::get('upload', 'BudgetController@showForm');
//Route::post('upload', 'BudgetController@store');


Route::get('upload', 'UsersController@showForm');
Route::post('upload', 'UsersController@import');

Route::get('/home','HomeController@showForm');
Route::post('/excelUpload','HomeController@excelUpload')->name('excelUpload');

Route::get('importExportView', 'MyController@importExportView');
Route::get('export', 'MyController@export')->name('export');
Route::post('import', 'MyController@import')->name('import');
