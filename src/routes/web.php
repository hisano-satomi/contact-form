<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);

// 認証ルート
Route::get('/register', [ManagementController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [ManagementController::class, 'register']);
Route::get('/login', [ManagementController::class, 'showLoginForm'])->name('login');
Route::post('/login', [ManagementController::class, 'login']);
Route::post('/logout', [ManagementController::class, 'logout'])->name('logout');

// 管理者用ルートをミドルウェアで保護
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [ManagementController::class, 'index'])->name('admin');
    Route::get('/admin/export', [ManagementController::class, 'export'])->name('admin.export');
});