<?php

use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;

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
Route::get('/', [NewsController::class, 'index']);

Auth::routes();


Route::group(['middleware' => 'auth'], function () {	
	Route::resource('news', NewsController::class);
	Route::resource('user', UserController::class);
	
	Route::resource('permissions', PermissionsController::class);
	Route::resource('roles', RoleController::class);
	
	Route::get('news/delete/{id}', ['as' => 'news.delete', 'uses' => 'App\Http\Controllers\NewsController@delete']);
	Route::get('roles/delete/{id}', ['as' => 'roles.delete', 'uses' => 'App\Http\Controllers\Admin\RoleController@delete']);

	Route::get('permissions/delete/{id}', ['as' => 'permissions.delete', 'uses' => 'App\Http\Controllers\Admin\PermissionsController@delete']);
	Route::post('permissions/destroy/{id}', ['as' => 'permissions.destroy', 'uses' => 'App\Http\Controllers\Admin\PermissionsController@destroy']);

});

