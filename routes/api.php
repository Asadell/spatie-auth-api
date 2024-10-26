<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Route::apiResource('/posts', PostController::class);

Route::middleware(['auth:sanctum'])->group(function() {
    Route::get('/posts', [PostController::class, 'index'])->middleware('role:admin|author|viewer');
    Route::post('/posts', [PostController::class, 'store'])->middleware('role:admin|author');
    Route::put('/posts/{post}', [PostController::class, 'update'])->middleware('role:admin|author');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware('role:admin');
    Route::get('/posts/{post}', [PostController::class, 'show'])->middleware('role:admin|viewer');
});
