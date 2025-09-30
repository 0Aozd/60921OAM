<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/category', [CategoryController::class, 'index']);

Route::get('/category/{id}', [CategoryController::class, 'show']);

Route::get('/user/{id}', [UserController::class, 'show']);

//Route::get('/transactions/{id}', [TransactionController::class, 'show']);

Route::get('/transaction', [TransactionController::class, 'index']);

Route::get('/transaction/create', [TransactionController::class, 'create'])
    ->middleware('auth');

Route::post('/transaction', [TransactionController::class, 'store'])
    ->middleware('auth');;

Route::get('/transaction/edit/{id}', [TransactionController::class, 'edit'])
    ->middleware('auth');

Route::post('/transaction/update/{id}', [TransactionController::class, 'update'])
    ->middleware('auth');

Route::get('/transaction/destroy/{id}', [TransactionController::class, 'destroy'])
    ->middleware('auth');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('error', function () {
    return view('error', ['message' => session('message')]);
});
