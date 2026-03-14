<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Redirect Halaman Awal
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| Route Login & Register
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function(){

    Route::get('/login', [AuthController::class,'showLogin'])->name('login');
    Route::post('/login', [AuthController::class,'login']);

    Route::get('/register', [AuthController::class,'showRegister'])->name('register');
    Route::post('/register', [AuthController::class,'register']);

});


/*
|--------------------------------------------------------------------------
| Route Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class,'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Route Yang Harus Login
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::resource('posts', PostController::class);

    Route::resource('categories', CategoryController::class);

});