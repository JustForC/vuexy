<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [AuthController::class, 'login']);

Route::group(['prefix' => 'auth', 'controller' => AuthController::class, 'as' => 'auth.'], function(){
    Route::get('login', 'login')->name('login');
    Route::post('login', 'doLogin')->name('doLogin');
    Route::get('register', 'register')->name('register');
    Route::post('register', 'doRegister')->name('doRegister');
    Route::get('logout', 'doLogout')->name('logout');
});

Route::group(['prefix' => 'category', 'controller' => CategoryController::class, 'as' => 'category.'],function(){
    Route::get('/', 'index')->name('index');
});

Route::group(['prefix' => 'product', 'controller' => ProductController::class, 'as' => 'product.'],function(){
    Route::get('/', 'index')->name('index');
});
