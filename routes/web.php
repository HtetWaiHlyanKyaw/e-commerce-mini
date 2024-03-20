<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandModelController;
use App\Http\Controllers\Admin\DashboardController;
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

 //
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


});



Auth::routes();
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/brands/brands_list', function() {
    return view('admin.brands.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
