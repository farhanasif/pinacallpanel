<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\BalanceController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth::routes();
//Route::get('/dashboard','DashboardController@panel');
Route::get('/admin/dashboard','DashboardController@panel')->name('dashboard');
Route::get('/admin/login','LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login','LoginController@login')->name('login');
Route::post('/admin/logout','LoginController@logout')->name('user.logout');

// ************************** ALL Guest ROUTS***********************************
Route::get('/create/guest','GuestController@create')->name('create.form');
Route::post('/store/guest','GuestController@store')->name('guest.store');
Route::get('/all/guest','GuestController@all_guest')->name('all.guest');
Route::get('/edit/guest/{id}','GuestController@edit')->name('edit.guest');
Route::post('/update/guest/{id}','GuestController@update')->name('update.guest');
Route::get('/delete/guest/{id}','GuestController@deleteGuest')->name('delete.guest');


// ************************** ALL Host ROUTS***********************************
Route::get('/create/host','HostController@create')->name('create.host');
Route::post('/store/host','HostController@hostStore')->name('storeHost');
Route::get('/all/host','HostController@all_host')->name('all.host');
Route::get('/edit/host/{id}','HostController@edit')->name('edit.host');
Route::post('/update/host/{id}','HostController@update')->name('update.host');
Route::get('/delete/host/{id}','HostController@deleteHost')->name('delete.host');


// ************************** ALL Balance ROUTS***********************************
Route::get('/all/balance','BalanceController@all_balance')->name('all.balance');
Route::get('/create/balance','BalanceController@createBalance')->name('create.balance');
Route::post('/store/balance','BalanceController@StoreBalance')->name('balance.store');



