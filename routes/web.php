<?php

// use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandModelController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

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

// Product URLs
Route::prefix('admin/product')->group(function(){
    Route::get('/page', [ProductController::class, 'page'])->name('product.page');
    Route::post('/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/list',[ProductController::class, 'list'])->name('product.list');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
});

//Product URL


// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
// Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
// Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Auth::routes();
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/brands/brands_list', function() {
    return view('admin.brands.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');







