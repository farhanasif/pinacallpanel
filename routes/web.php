<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;


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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
//Route::get('/dashboard','DashboardController@panel');
Route::get('/admin/dashboard','DashboardController@panel')->name('dashboard');
Route::get('/admin/login','LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login','LoginController@login')->name('user.login');
Route::post('/admin/logout','LoginController@logout')->name('user.logout');



