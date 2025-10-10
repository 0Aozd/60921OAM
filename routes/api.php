<?php


use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\TransactionApiController;
use App\Http\Controllers\UserApiController;
use Illuminate\Support\Facades\Route;

Route::get('/transactions', [TransactionApiController::class, 'index']);
Route::get('/transactions/{id}', [TransactionApiController::class, 'show']);

Route::get('/categories', [CategoryApiController::class, 'index']);
Route::get('/categories/{id}', [CategoryApiController::class, 'show']);

Route::get('/users', [UserApiController::class, 'index']);
Route::get('/users/{id}', [UserApiController::class, 'show']);
