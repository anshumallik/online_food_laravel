<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('roles','RoleController');
Route::resource('permissions','PermissionController');
Route::resource('users', 'UserController');
Route::resource('vendors', 'VendorController');
Route::get('changeStatus', 'VendorController@changeStatus');
Route::get('create-sub-cat', 'CategoryController@createSubcat')->name('sub_cat_create');
Route::get('create-sub-sub-cat', 'CategoryController@createsub_subcat')->name('sub_sub_cat_create');
Route::resource('categories','CategoryController');


