<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
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






});
