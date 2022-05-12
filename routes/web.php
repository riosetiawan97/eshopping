<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\WishlistController;

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

Route::get('load-cart-data', [CartController::Class, 'cartcount']);
Route::post('add-to-cart', [CartController::Class, 'addproduct']);
Route::post('delete-cart-item', [CartController::Class, 'deleteproduct']);
Route::post('update-cart', [CartController::Class, 'updatecart']);

Route::get('load-wishlist-data', [WishlistController::Class, 'wishlistcount']);
Route::post('add-to-wishlist', [WishlistController::Class, 'add']);
Route::post('remove-wishlist-item', [WishlistController::Class, 'deleteitem']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::Class, 'viewcart']);
    Route::get('checkout', [CheckoutController::Class, 'index']);
    Route::post('place-order', [CheckoutController::Class, 'placeorder']);

    Route::get('my-order', [UserController::Class, 'index']);
    Route::get('view-order/{id}', [UserController::Class, 'view']);
    Route::get('wishlist', [WishlistController::Class, 'index']);

    Route::post('proceed-to-pay', [CheckoutController::Class, 'razorpaycheck']);
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

    Route::get('order', [OrderController::Class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::Class, 'view']);
    Route::put('update-order/{id}', [OrderController::Class, 'updateorder']);
    Route::get('order-history', [OrderController::Class, 'orderhistory']);

    Route::get('user', [DashboardController::Class, 'user']);
    Route::get('view-user/{id}', [DashboardController::Class, 'viewuser']);
});