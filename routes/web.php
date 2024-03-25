<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLogin'])->name('show-login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    
    Route::post('/store', [ArticleController::class, 'store'])->name('tambah-data');
    
    
    Route::get('/delete/{id}', [ArticleController::class, 'delete'])->name('delete-data');
    
    Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('edit-data');
    Route::put('/update/{id}', [ArticleController::class, 'update'])->name('update-data');

    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});

