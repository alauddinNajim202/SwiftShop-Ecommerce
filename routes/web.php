<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('admin', [AuthController::class, 'login'])->name('admin.auth.login');
Route::post('admin', [AuthController::class, 'auth_admin_login'])->name('admin.auth_admin_login');
Route::get('admin/logout', [AuthController::class, 'auth_admin_logout'])->name('admin.auth_admin_logout');

// middleware
Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
