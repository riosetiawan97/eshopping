<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard', 'Admin\FrontendController@index');
    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-categories', 'Admin\CategoryController@add');
    Route::post('insert-categories', 'Admin\CategoryController@insert');
    Route::get('edit-categories/{id}', [CategoryController::Class, 'edit']);
    Route::put('update-categories/{id}', [CategoryController::Class, 'update']);
    Route::get('delete-categories/{id}', [CategoryController::Class, 'destroy']);
});