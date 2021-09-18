<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\useraccess\findmyspecController;
use App\Http\Controllers\HomeController;

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

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/delivery', [HomeController::class, 'deliveryy'])->name('delivery');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/returns', [HomeController::class, 'returns'])->name('returns');
Route::get('/', 'HomeController@index')->name('home');
Route::get('detail/{id}', [HomeController::class, 'detail']);
Route::get('category_detail/{slug}', [HomeController::class, 'viewcategory']);


Auth::routes();

// authenticated users
Route::middleware(['auth'])->group(function () {
    Route::post('/add-to-cart', [CartController::class, 'addProduct']);
    Route::get('/findspec', [findmyspecController::class, 'addSpec']);
    Route::post('/insert-spec', [findmyspecController::class, 'insert']);
    Route::get('/myspec/{Auth::user()}', [findmyspecController::class, 'myspec']);
});

// admin routes
Route::middleware(['auth', 'rumpadm'])->group(function (){
    Route::get('/rumpadms', 'Admin\DashboardController@dashboard')->name('dash');
    // category routes
    Route::get('/categories', 'Admin\CategoryController@index');
    Route::get('/add-category', 'Admin\CategoryController@add')->name('addcate');
    Route::post('/insert-category', 'Admin\CategoryController@insert');
    Route::get('edit-cate/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

    // Brand Routes
    Route::get('/brands', [BrandController::class, 'index']);
    Route::get('/add-brand', [BrandController::class, 'add']);
    Route::post('/insert-brand', [BrandController::class, 'insert']);
    Route::get('edit-brand/{id}', [BrandController::class, 'edit']);
    Route::put('update-brand/{id}', [BrandController::class, 'update']);
    Route::get('delete-brand/{id}', [BrandController::class, 'destroy']);

    // Size Routes
    Route::get('/sizes', [SizeController::class, 'index']);
    Route::get('/add-size', [SizeController::class, 'add']);
    Route::post('/insert-size', [SizeController::class, 'insert']);
    Route::get('edit-size/{id}', [SizeController::class, 'edit']);
    Route::put('update-size/{id}', [SizeController::class, 'update']);
    Route::get('delete-size/{id}', [SizeController::class, 'destroy']);

    // Products routes
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/add-product', [ProductController::class, 'add']);
    Route::post('/insert-product', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);
});
