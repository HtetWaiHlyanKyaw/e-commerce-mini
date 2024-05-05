<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\BrandModelController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\user\MasterController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\user\HistoryController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MidBannerController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\Admin\BottomBannerController;
use App\Http\Controllers\Admin\CustomerPurchaseController;
use App\Http\Controllers\Admin\SupplierPurchaseController;

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


// Route::get('/', function () {
//     return redirect()->route('user.page');
// });
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
        Route::get('/filter', [SupplierPurchaseController::class, 'filter'])->name('supplier_purchase.filter');
        Route::get('/delete/{id}', [SupplierPurchaseController::class, 'delete'])->name('supplier.delete');
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
        Route::get('/filter', [CustomerPurchaseController::class, 'filter'])->name('customer_purchase.filter');
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
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/profile', [ProfileController::class, 'index'])->name('admin.profile');

    Route::prefix('admin/TopBanner')->group(function () {
        Route::get('/list', [BannerController::class, 'list'])->name('admin.TopBanner.list');
        Route::get('/create', [BannerController::class, 'create'])->name('admin.TopBanner.create');
        Route::post('/store', [BannerController::class, 'store'])->name('admin.TopBanner.store');
        Route::get('/list/edit/{id}', [BannerController::class, 'edit'])->name('admin.TopBanner.edit');
        Route::post('/list/update/{id}', [BannerController::class, 'update'])->name('admin.TopBanner.update');
        Route::get('/delete/{id}', [BannerController::class, 'delete'])->name('TopBanner.delete');
    });

    Route::prefix('admin/MiddleBanner')->group(function () {
        Route::get('/list', [MidBannerController::class, 'list'])->name('admin.MiddleBanner.list');
        Route::get('/create', [MidBannerController::class, 'create'])->name('admin.MiddleBanner.create');
        Route::post('/store', [MidBannerController::class, 'store'])->name('admin.MiddleBanner.store');
        Route::get('/list/edit/{id}', [MidBannerController::class, 'edit'])->name('admin.MiddleBanner.edit');
        Route::post('/list/update/{id}', [MidBannerController::class, 'update'])->name('admin.MiddleBanner.update');
        Route::get('/delete/{id}', [MidBannerController::class, 'delete'])->name('MiddleBanner.delete');
    });
    Route::prefix('admin/BottomBanner')->group(function () {
        Route::get('/list', [BottomBannerController::class, 'list'])->name('admin.BottomBanner.list');
        Route::get('/create', [BottomBannerController::class, 'create'])->name('admin.BottomBanner.create');
        Route::post('/store', [BottomBannerController::class, 'store'])->name('admin.BottomBanner.store');
        Route::get('/list/edit/{id}', [BottomBannerController::class, 'edit'])->name('admin.BottomBanner.edit');
        Route::post('/list/update/{id}', [BottomBannerController::class, 'update'])->name('admin.BottomBanner.update');
        Route::get('/delete/{id}', [BottomBannerController::class, 'delete'])->name('BottomBanner.delete');
    });
});

//admin Login Control

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('logout');

//user Login and Register Control
Route::get('/user/login', [UserLoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/login', [UserLoginController::class, 'login']);
Route::post('/user/logout', [UserLoginController::class, 'logout'])->name('user.logout');
Route::get('/user/Register_Page', [UserRegisterController::class, 'page'])->name('user.RegisterPage');
Route::post('/user/registration', [UserRegisterController::class, 'register'])->name('user.register');
//all user routes
Route::get('/', [PageController::class, 'index'])->name('user.page');
Route::get('/regular_page', [UserController::class, 'RegularPage'])->name('user.rePage');
Route::get('/contact', [UserController::class, 'contact'])->name('user.contact');
Route::get('/singleBlog', [UserController::class, 'singleBlog'])->name('user.Sblog');
Route::POST('/checkout', [UserController::class, 'checkout'])->name('user.checkout');
Route::get('/blog', [UserController::class, 'blog'])->name('user.blog');
Route::get('/productDetail', [UserController::class, 'productDetail'])->name('user.detail');
Route::get('/comments/{product_id}/{limit}', [ShopController::class, 'fetchComments']);
Route::post('/comments/store', [ShopController::class, 'storeComment'])->name('user.comment.store');
Route::post('/userFilter', [ShopController::class, 'filterProducts'])->name('filter.products');
Route::post('/checkout/create', [ShopController::class, 'purchaseCreate'])->name('customer_purchase.create');
Route::get('/shop', [ShopController::class, 'shop'])->name('user.shop');
Route::get('/history', [HistoryController::class, 'list'])->name('user.history');
Route::get('/history/detail/{id}', [HistoryController::class, 'detail'])->name('user.history_detail');
// routes/web.php

Route::get('/search', [MasterController::class, 'search'])->name('search');

// Route::get('/product/detail{id}',[ShopController::class, 'detail'])->name('user.productDetail');
Route::get('/product/details', [ShopController::class, 'details'])->name('user.productDetails');
Route::get('/profile', [UserProfileController::class, 'profile'])->name('user.profile');
Route::post('/profile/update', [UserProfileController::class, 'profileUpdate'])->name('user.pUpdate');

Route::get('/user/checkout2', [CustomerPurchaseController::class, 'checkoutPage'])->name('user.checkout2');

Route::middleware('user')->group(function () {
    Route::post('/cart/add', [CartController::class, 'add'])->name('user.cardAdd');
    Route::get('/cart', [CartController::class, 'cart'])->name('cartList');
    Route::get('/cart/product/delete', [CartController::class, 'deleteProduct'])->name('cart.product.delete');
    Route::get('/cart/clear', [CartController::class, 'clearcart'])->name('cart.clear');
    Route::get('/cart/process', [CartController::class, 'cartprocess'])->name('cart.process');
});
Route::get('/user/checkout2', [CustomerPurchaseController::class, 'checkoutPage'])->name('user.checkout2');
Route::post('/customer-purchase/create', [CustomerPurchaseController::class, 'createCustomerPurchase'])->name('customer_purchase.create2');
