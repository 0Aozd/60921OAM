<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello world!']);
});
Route::get('/category', [CategoryController::class, 'index']);

Route::get('/category/{id}', [CategoryController::class, 'show']);

Route::get('/transaction', [TransactionController::class, 'index']);

Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/transaction/{id}', [TransactionController::class, 'show']);
