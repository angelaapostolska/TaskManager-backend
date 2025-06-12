<?php

use App\Actions\DeleteTask;
use App\Actions\MarkCompleted;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\TaskController;
use App\MarkPending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//public route: login
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
//protected routes
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    //logout route
    Route::post('/logout', [AuthController::class, 'logout']);

    //Task related routes
    Route::apiResource('tasks', TaskController::class);
    Route::patch('/tasks/{task}/completeTask', [MarkCompleted::class, 'handle']);
    Route::patch('/tasks/{task}/deleteTask', [DeleteTask::class, 'handle']);
});
