<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Redirect Awal
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| AUTH (Guest Only)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function(){

    // LOGIN
    Route::get('/login', [AuthController::class,'showLogin'])->name('login');
    Route::post('/login', [AuthController::class,'login']);

    // REGISTER
    Route::get('/register', [AuthController::class,'showRegister'])->name('register');
    Route::post('/register', [AuthController::class,'register']);

});


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class,'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| AREA LOGIN (ADMIN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function(){

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    // POSTS
    Route::resource('posts', PostController::class);

    // CATEGORIES
    Route::resource('categories', CategoryController::class);

    // KOMENTAR (STORE SAJA)
    Route::post('/comments', [CommentController::class,'store'])->name('comments.store');

});