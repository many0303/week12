<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//punlic
Route::post('/register', [AuthController::class, 'register']);
Route::get('/todo', [TodoController::class, 'index']);
//private
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/todo', [TodoController::class, 'store']);
    Route::put('/todo/{id}', [TodoController::class, 'update']);
    Route::delete('/todo/{id}', [TodoController::class, 'destroy']);
});




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
