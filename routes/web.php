<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductModelController;
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

Route::prefix('admin/brand')->group(function(){
    Route::get('/page', [BrandController::class, 'page'])->name('brand.page');
    Route::post('/create', [BrandController::class, 'create'])->name('brand.create');
    Route::get('/list',[BrandController::class, 'list'])->name('brand.list');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
});

Route::prefix('admin/model')->group(function(){
    Route::get('/page', [ProductModelController::class, 'page'])->name('product_model.page');
    Route::post('/create', [ProductModelController::class, 'create'])->name('product_model.create');
    Route::get('/list',[ProductModelController::class, 'index'])->name('product_model.list');
    Route::get('/edit/{id}', [ProductModelController::class, 'edit'])->name('product_model.edit');
    Route::post('/update/{id}', [ProductModelController::class, 'update'])->name('product_model.update');
    Route::get('/delete/{id}', [ProductModelController::class, 'delete'])->name('product_model.delete');
});

Auth::routes();
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/brands/brands_list', function() {
//     return view('admin.brands.index');
// });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
