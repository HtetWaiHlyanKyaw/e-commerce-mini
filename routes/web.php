<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CustomerPurchaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandModelController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SupplierPurchaseController;
use App\Http\Controllers\Admin\ProfileController;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Middleware
Route::middleware(['admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Brand URLs
    Route::prefix('admin/brand')->group(function () {
        Route::get('/page', [BrandController::class, 'page'])->name('brand.page');
        Route::post('/create', [BrandController::class, 'create'])->name('brand.create');
        Route::get('/list', [BrandController::class, 'list'])->name('brand.list');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    });

    //Model URLs
    Route::prefix('admin/model')->group(function () {
        Route::get('/page', [BrandModelController::class, 'page'])->name('model.page');
        Route::post('/create', [BrandModelController::class, 'create'])->name('model.create');
        Route::get('/list', [BrandModelController::class, 'index'])->name('model.list');
        Route::get('/edit/{id}', [BrandModelController::class, 'edit'])->name('model.edit');
        Route::post('/update/{id}', [BrandModelController::class, 'update'])->name('model.update');
        Route::get('/delete/{id}', [BrandModelController::class, 'delete'])->name('model.delete');
    });

    // Product URLs
    Route::prefix('admin/product')->group(function () {
        Route::get('/index', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    });

    //Customer URL
    Route::prefix('admin/customer')->group(function () {
        Route::get('/list', [CustomerController::class, 'list'])->name('customer.page');
    });

    //Customer Purchase URL
    Route::prefix('admin/customer purchase')->group(function () {
        Route::get('/page', [CustomerPurchaseController::class, 'page'])->name('customer_purchase.page');
        Route::get('/list', [CustomerPurchaseController::class, 'list'])->name('customer_purchase.list');
        Route::get('/detail/{id}', [CustomerPurchaseController::class, 'detail'])->name('customer_purchase.detail');
    });

    //review Url
    Route::prefix('admin/product')->group(function () {
        Route::get('/reviews', [ReviewController::class, 'review'])->name('product.reviews');
    });

    Route::prefix('admin/supplier')->group(function () {
        Route::get('/page', [SupplierController::class, 'page'])->name('supplier.page');
        Route::post('/create', [SupplierController::class, 'create'])->name('supplier.create');
        Route::get('/list', [SupplierController::class, 'list'])->name('supplier.list');
        Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
        Route::post('/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
        Route::get('/delete/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');
    });

    //supplier purchase URL
    Route::prefix('admin/supplier purchase')->group(function () {
        Route::get('/page', [SupplierPurchaseController::class, 'page'])->name('supplier_purchase.page');
        Route::post('/create', [SupplierPurchaseController::class, 'create'])->name('supplier_purchase.create');
        Route::get('/list', [SupplierPurchaseController::class, 'list'])->name('supplier_purchase.list');
        Route::get('/detail/{id}', [SupplierPurchaseController::class, 'detail'])->name('supplier_purchase.detail');
        // Route::get('/delete/{id}', [SupplierPurchaseController::class, 'delete'])->name('supplier.delete');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::prefix('admin/Admin')->group(function () {
        Route::get('/page', [AdminController::class, 'page'])->name('Admin.page');
        Route::post('/create', [AdminController::class, 'create'])->name('Admin.create');
        Route::get('/list', [AdminController::class, 'list'])->name('Admin.list');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('Admin.edit');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('Admin.update');
        Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('Admin.delete');
    });
});

Auth::routes();

Route::get('/brands/brands_list', function () {
    return view('admin.brands.index');
});
