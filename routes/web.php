<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    PostController,
    CategoryController,
    DashboardController,
    CommentController,
    HomeController
};

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::redirect('/', '/blog');

Route::controller(HomeController::class)->group(function () {
    Route::get('/blog', 'index')->name('blog');
    Route::get('/artikel', 'artikel')->name('artikel');
    Route::get('/artikel/{id}', 'show')->name('artikel.show');
    Route::get('/kategori/{id}', 'kategori')->name('kategori');
    Route::get('/search', 'search')->name('search');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
});

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login.process');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->name('register.process');
});

/*
|--------------------------------------------------------------------------
| Admin Area (Protected)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin Resources
    Route::resources([
        'posts'      => PostController::class,
        'categories' => CategoryController::class,
    ]);

    // Logout (Disarankan menggunakan POST agar aman dari request manipulasi)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});