<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [FrontendController::Class, 'index']);
Route::get('category', [FrontendController::Class, 'category']);
Route::get('category/{slug}', [FrontendController::Class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::Class, 'viewproduct']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::post('add-to-cart', [CartController::Class, 'addProduct']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard', 'Admin\FrontendController@index');
    /* Category */
    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-categories', 'Admin\CategoryController@add');
    Route::post('insert-categories', 'Admin\CategoryController@insert');
    Route::get('edit-categories/{id}', [CategoryController::Class, 'edit']);
    Route::put('update-categories/{id}', [CategoryController::Class, 'update']);
    Route::get('delete-categories/{id}', [CategoryController::Class, 'destroy']);
   /* Product */
   Route::get('product', [ProductController::Class, 'index']);
   Route::get('add-product', [ProductController::Class, 'add']);
   Route::post('insert-product', [ProductController::Class, 'insert']);
   Route::get('edit-product/{id}', [ProductController::Class, 'edit']);
   Route::put('update-product/{id}', [ProductController::Class, 'update']);
   Route::get('delete-product/{id}', [ProductController::Class, 'destroy']); 
});