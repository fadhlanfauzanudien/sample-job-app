<?php
use App\Http\Controllers\CVController;

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

Route::resource('jobs', 'JobController');
Route::put('changeJobStatus/{id}', 'JobController@changeStatus');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('profile', 'ProfileController')->middleware('auth');
Route::resource('image', 'ImageController');
Route::put('/user/{id}', 'UserController@update');

Route::get('/cv/upload', 'CVController@upload');
Route::get('/cv/download/{id}', 'CVController@download');
Route::resource('/cv', 'CVController');

Route::get('/admin/dashboard', 'AdminController@dashboard');