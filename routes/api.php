<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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

Route::prefix('posts')->group(function () {
    Route::post('/store', [PostController::class, 'store']);
    Route::get('/all', [PostController::class, 'getAll']);
    Route::get('/{id}', [PostController::class, 'postDetails']);
});

Route::prefix('users')->group(function () {
    Route::post('/register', [UserController::class, 'register']);
});

Route::prefix('tasks')->group(function () {
    Route::post('/store', [TaskController::class, 'store']);
    Route::patch('/{id}', [TaskController::class, 'update']);
    Route::get('/pending', [TaskController::class, 'pending']);
});