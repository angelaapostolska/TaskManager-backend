<?php

use App\Actions\DeleteTask;
use App\Actions\MarkCompleted;
use App\Http\Controllers\Api\TaskController;
use App\MarkPending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('tasks', TaskController::class);
Route::patch('/tasks/{task}/completeTask', [MarkCompleted::class, 'completeTask']);
Route::patch('/tasks/{task}/deleteTask', [DeleteTask::class, 'deleteTask']);




