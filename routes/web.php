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

Route::put('/jobs/changeJobStatus/{id}', 'JobController@changeStatus');
Route::get('jobs/applied-job', 'JobController@applied')->name('jobs.applied');
Route::post('/jobs/apply/{id}', 'JobController@apply');
Route::resource('/jobs', 'JobController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('profile', 'ProfileController')->middleware('auth');
Route::resource('image', 'ImageController');
Route::put('/user/{id}', 'UserController@update');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/cv/upload', 'CVController@upload');
    Route::get('/cv/download/{id}', 'CVController@download');
    Route::get('/cv/accept/{id}', 'CVController@accept');
    Route::get('/cv/reject/{id}', 'CVController@reject');
    Route::resource('cv', 'CVController');
});


Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/cv', 'AdminController@cv');
Route::get('/admin/users', 'AdminController@users');