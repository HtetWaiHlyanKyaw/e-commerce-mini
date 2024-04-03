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
use App\Http\Controllers\Admin\ExportController;
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
// routes/web.php


Route::get('/', function () {
    return redirect()->route('dashboard');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Middleware
//  Route::middleware(['admin'])->group(function () {
//Brand URLs
Route::middleware('admin:store_admin,super_admin')->group(function () {
// Define routes accessible to store_admin
    Route::prefix('admin/brand')->group(function () {
    Route::get('/page', [BrandController::class, 'page'])->name('brand.page');
    Route::post('/create', [BrandController::class, 'create'])->name('brand.create');
    Route::get('/list', [BrandController::class, 'list'])->name('brand.list');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
});

    // Route::middleware('admin:store_admin, super_admin')->group(function () {
        // Define routes accessible to store_admin
        // Route::prefix('admin/brand')->group(function () {
        //     Route::get('/page', [BrandController::class, 'page'])->name('brand.page');
        //     Route::post('/create', [BrandController::class, 'create'])->name('brand.create');
        //     Route::get('/list', [BrandController::class, 'list'])->name('brand.list');
        //     Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        //     Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
        //     Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
        // });

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

        Route::prefix('admin/product')->group(function () {
            Route::get('/reviews', [ReviewController::class, 'review'])->name('product.reviews');
        });
    });

    Route::middleware('admin:supplier_admin,super_admin')->group(function () {
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
            // Route::get('/filter', [SupplierPurchaseController::class, 'filter'])->name('supplier_purchase.filter');
            // Route::get('/delete/{id}', [SupplierPurchaseController::class, 'delete'])->name('supplier.delete');
            Route::get('/export', [ExportController::class, 'exportSupplierPurchases'])->name('export.supplier.purchases');
        });
    });

    Route::middleware('admin:super_admin')->group(function () {
        //Customer URL
        Route::prefix('admin/customer')->group(function () {
            Route::get('/list', [CustomerController::class, 'list'])->name('customer.page');
        });

//Customer Purchase URL
    Route::prefix('admin/customer purchase')->group(function () {
    Route::get('/page', [CustomerPurchaseController::class, 'page'])->name('customer_purchase.page');
    Route::get('/list', [CustomerPurchaseController::class, 'list'])->name('customer_purchase.list');
    Route::get('/detail/{id}', [CustomerPurchaseController::class, 'detail'])->name('customer_purchase.detail');
    Route::get('/export', [ExportController::class, 'exportCustomerPurchases'])->name('export.customer.purchases');
    // Route::get('/filter', [CustomerPurchaseController::class, 'filter'])->name('customer_purchase.filter');
});
});
Route::middleware('admin:super_admin')->group(function () {
Route::prefix('admin/Admin')->group(function () {
    Route::get('/page', [AdminController::class, 'page'])->name('Admin.page');
    Route::post('/create', [AdminController::class, 'create'])->name('Admin.create');
    Route::get('/list', [AdminController::class, 'list'])->name('Admin.list');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('Admin.edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('Admin.update');
    Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('Admin.delete');
});
});
Route::middleware('admin:super_admin,store_admin,supplier_admin')->group(function () {

Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
 });
 Route::get('/dashboard', function () {
    // If user is authenticated, allow access to dashboard
    if (auth()->check()) {
        return view('admin.dashboard');
    }
    // If user is not authenticated, redirect to login
    return redirect()->route('login');
})->name('dashboard');

Auth::routes();

