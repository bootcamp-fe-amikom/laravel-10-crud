<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['jwt'])->group(function () {
    Route::get('/user', [AuthController::class, 'userData']);
});


Route::get('/api-pertama', [ProductController::class, 'index']);
Route::get('/articles', [ArticleController::class, 'getArticleFromApi']);
