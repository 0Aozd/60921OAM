<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\TransactionApiController;
use App\Http\Controllers\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/transactions', [TransactionApiController::class, 'index']);
Route::get('/transactions/{id}', [TransactionApiController::class, 'show']);
Route::get('/transactions_total', [TransactionApiController::class, 'total']);
/*Route::middleware('auth:sanctum')->get('/transaction', [TransactionApiController::class, 'index']);*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/categories', [CategoryApiController::class, 'index']);
    Route::get('/categories/{id}', [CategoryApiController::class, 'show']);
    Route::get('/categories_total', [CategoryApiController::class, 'total']);
    Route::post('/category', [CategoryApiController::class, 'store']);
});
Route::get('/users', [UserApiController::class, 'index']);
Route::get('/users/{id}', [UserApiController::class, 'show']);

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request){
    return $request->user();
});*/

/*Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);*/

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/transaction', [TransactionApiController::class, 'index']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});
