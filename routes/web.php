<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', function(){return view('front.about');})->name('about');
Route::get('/delivery', function(){return view('front.delivery');})->name('delivery');
Route::get('/terms', function(){return view('front.terms');})->name('terms');
Route::get('/faq', function(){return view('front.faq');})->name('faq');
Route::get('/returns', function(){return view('front.returns');})->name('returns');

// authenticated users
Auth::routes();

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
