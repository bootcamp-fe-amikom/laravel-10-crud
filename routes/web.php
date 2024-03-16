<?php

use App\Http\Controllers\ArticleController;

use Illuminate\Support\Facades\Route;


Route::get('/', [ArticleController::class, 'index'])->name('home');

Route::post('/store', [ArticleController::class, 'store'])->name('tambah-data');


Route::get('/delete/{id}', [ArticleController::class, 'delete'])->name('delete-data');

Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('edit-data');
Route::put('/update/{id}', [ArticleController::class, 'update'])->name('update-data');
