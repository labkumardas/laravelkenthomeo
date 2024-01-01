<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\adminDashboardController as adminDashboardController;
use App\Http\Controllers\Admin\productController as productController;
use App\Http\Controllers\Admin\ContentController as ContentController;
use App\Http\Controllers\User\UserController as UserController;
use App\Http\Controllers\Admin\userController as admminUserController;
use App\Http\Controllers\Admin\orderController as orderController;
use App\Http\Controllers\Admin\transcationController as transcationController;
use App\Http\Controllers\Admin\categoryController as categoryController;
use App\Http\Controllers\Admin\cmsController as cmsController;



Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::middleware('checkAdmin')->group(function () {
    //page url 
    Route::get('/admin/dashboard', [adminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/create/category', [categoryController::class, 'createCategory'])->name('admin.createCategory');
    Route::get('/admin/view/category', [categoryController::class, 'viewCategory'])->name('admin.viewCategory');
    Route::get('/admin/create/product', [productController::class, 'createProduct'])->name('admin.createProduct');
    Route::get('/admin/view/product', [productController::class, 'viewProduct'])->name('admin.viewProduct');
    Route::get('/admin/create/blog', [ContentController::class, 'createBlog'])->name('admin.createBlog');
    Route::get('/admin/view/blog', [ContentController::class, 'viewBlog'])->name('admin.viewBlog');

    Route::get('/admin/create/user', [admminUserController::class, 'createUser'])->name('admin.createUser');
    Route::get('/admin/view/user', [admminUserController::class, 'viewUser'])->name('admin.viewUser');
    Route::get('/admin/create/order', [orderController::class, 'createOrder'])->name('admin.createOrder');
    Route::get('/admin/view/order', [orderController::class, 'viewOrder'])->name('admin.viewOrder');
    Route::get('/admin/view/transactions', [transcationController::class, 'viewTransactions'])->name('admin.viewTransactions');
    Route::get('/admin/view/Subcategory/{id}', [categoryController::class, 'viewSubcategory'])->name('admin.viewSubcategory');

    ////Cms
    Route::get('/admin/about-us', [cmsController::class, 'aboutUs'])->name('admin.aboutUs');

    //database store //
    Route::post('/admin/store/blog', [ContentController::class, 'storeBlog'])->name('admin.storeBlog');
    Route::post('/admin/store/category', [categoryController::class, 'storeCategory'])->name('admin.storeCategory');
    Route::post('/admin/store/storeSubCategory', [categoryController::class, 'storeSubCategory'])->name('admin.storeSubCategory');
    Route::post('/admin/store/product', [productController::class, 'storeProduct'])->name('admin.storeProduct');
    Route::post('/admin/store/user', [admminUserController::class, 'storeUser'])->name('admin.storeUser');

    ////profile
    Route::post('/admin/logout', [adminDashboardController::class, 'logout'])->name('admin.logout');

    //ajax
    Route::get('/admin/ajax/subcatById/{id}', [categoryController::class, 'subcatById'])->name('admin.getSubcategories');
});

//////for user
Route::middleware('checkUserRole')->group(function () {
    // User routes go here
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
