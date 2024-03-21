<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandModelController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

 //Brand URLs
Route::prefix('admin/brand')->group(function(){
    Route::get('/page', [BrandController::class, 'page'])->name('brand.page');
    Route::post('/create', [BrandController::class, 'create'])->name('brand.create');
    Route::get('/list',[BrandController::class, 'list'])->name('brand.list');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');

});

//Model URLs
Route::prefix('admin/model')->group(function(){
    Route::get('/page', [BrandModelController::class, 'page'])->name('model.page');
    Route::post('/create', [BrandModelController::class, 'create'])->name('model.create');
    Route::get('/list',[BrandModelController::class, 'index'])->name('model.list');
    Route::get('/edit/{id}', [BrandModelController::class, 'edit'])->name('model.edit');
    Route::post('/update/{id}', [BrandModelController::class, 'update'])->name('model.update');
    Route::get('/delete/{id}', [BrandModelController::class, 'delete'])->name('model.delete');
});

// Route::prefix('admin/product')->group(function(){
//     Route::get('/page', [ProductController::class, 'page'])->name('product.page');
//     Route::post('/create', [ProductController::class, 'create'])->name('product.create');
//     Route::get('/list',[ProductController::class, 'list'])->name('product.list');
//     Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
//     Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
//     Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
// });

Route::prefix('admin/supplier')->group(function(){
    Route::get('/page', [SupplierController::class, 'page'])->name('supplier.page');
    Route::post('/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::get('/list',[SupplierController::class, 'list'])->name('supplier.list');
    Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::post('/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::get('/delete/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');
});

Auth::routes();
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/brands/brands_list', function() {
    return view('admin.brands.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');







