<?php
include 'Admin.php';

use App\Http\Controllers\Website\AuthController;
use App\Http\Controllers\Website\IndexController;
use App\Http\Controllers\Website\TaskController;
use Illuminate\Support\Facades\Route;
//auth
Route::prefix('user/')->middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'registerForm'])->name('user.register.form');
    Route::post('register', [AuthController::class, 'register'])->name('user.register');
    Route::get('login', [AuthController::class, 'loginForm'])->name('user.login.form');
    Route::post('login', [AuthController::class, 'login'])->name('user.login');
});


//user
Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');
    Route::resource('tasks', TaskController::class);
});
Route::get('/', [IndexController::class, 'index'])->name('index');
