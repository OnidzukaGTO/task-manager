<?php

use App\Http\Controllers\TaskController;
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
Route::get('tasks', [TaskController::class, 'index']) ->name('task.index');
Route::post('task', [TaskController::class, 'store']) ->name('task.store');
Route::get('task/{id}', [TaskController::class, 'show']) ->name('task.show');
Route::put('task/{id}', [TaskController::class, 'update']) ->name('task.update');
Route::delete('task/{id}', [TaskController::class, 'delete']) ->name('task.delete');

