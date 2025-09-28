<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/category', [CategoryController::class, 'index']);

Route::get('/category/{id}', [CategoryController::class, 'show']);

Route::get('/user/{id}', [UserController::class, 'show']);

//Route::get('/transactions/{id}', [TransactionController::class, 'show']);

Route::get('/transaction', [TransactionController::class, 'index']);

Route::get('/transaction/create', [TransactionController::class, 'create']);

Route::post('/transaction', [TransactionController::class, 'store']);

Route::get('/transaction/edit/{id}', [TransactionController::class, 'edit']);

Route::post('/transaction/update/{id}', [TransactionController::class, 'update']);

Route::get('/transaction/destroy/{id}', [TransactionController::class, 'destroy']);
