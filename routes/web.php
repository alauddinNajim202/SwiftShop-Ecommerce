<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;

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


// auth login

Route::get('admin/login', [AuthController::class, 'login'])->name('admin.auth.login');
Route::post('admin/login', [AuthController::class, 'auth_admin_login'])->name('admin.auth_admin_login');
Route::get('admin/logout', [AuthController::class, 'auth_admin_logout'])->name('admin.auth_admin_logout');

// middleware
Route::group(['middleware' => 'admin'], function () {
    // dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    // admin resource route
    Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');

    Route::get('admin/list', [AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');

     // category resource route
     Route::get('category/list', [CategoryController::class, 'index'])->name('category.index');
     Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
     Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
     Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
     Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
     Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');


     // sub-category resource route
     Route::get('sub-category/list', [SubCategoryController::class, 'index'])->name('sub_category.index');
     Route::get('sub-category/create', [SubCategoryController::class, 'create'])->name('sub_category.create');
     Route::post('sub-category/store', [SubCategoryController::class, 'store'])->name('sub_category.store');
     Route::get('sub-category/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub_category.edit');
     Route::post('sub-category/update/{id}', [SubCategoryController::class, 'update'])->name('sub_category.update');
     Route::get('sub-category/delete/{id}', [SubCategoryController::class, 'delete'])->name('sub_category.delete');


    // product resource route
    Route::get('product/list', [ProductController::class, 'index'])->name('product.index');
    Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');




    // brand resource route
    Route::get('brand/list', [BrandController::class, 'index'])->name('brand.index');
    Route::get('brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');

    // color resource route
    Route::get('color/list', [ColorController::class, 'index'])->name('color.index');
    Route::get('color/create', [ColorController::class, 'create'])->name('color.create');
    Route::post('color/store', [ColorController::class, 'store'])->name('color.store');
    Route::get('color/edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
    Route::post('color/update/{id}', [ColorController::class, 'update'])->name('color.update');
    Route::get('color/delete/{id}', [ColorController::class, 'delete'])->name('color.delete');






});
