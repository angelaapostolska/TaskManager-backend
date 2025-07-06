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

    Route::post('/me', [AuthController::class, 'me']);

    //logout route
    Route::post('/logout', [AuthController::class, 'logout']);

    //Task related routes
    Route::apiResource('tasks', TaskController::class);
    Route::get('/myTasks', [TaskController::class, 'myTasks']);
    Route::get('/myTasks/byBoard/{board}', [TaskController::class, 'myTasksByBoard']);
    Route::patch('/tasks/{task}/completeTask', [MarkCompleted::class, 'handle']);
    Route::patch('/tasks/{task}/deleteTask', [DeleteTask::class, 'handle']);

    //completed task from the day
    Route::get('/myTasks/todayStats', [TaskController::class, 'todayStats']);
});
