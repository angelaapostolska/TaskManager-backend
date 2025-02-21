<?php

namespace App\Http\Controllers\Api;

use App\Actions\DeleteTask;
use App\Actions\MarkCompleted;
use App\Enums\TaskState;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\MarkPending;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $tasks = Task::all();
        return TaskResource::collection($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request): TaskResource
    {
        $validatedData = $request->validated();
        $task = Task::query()->create($validatedData);
        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): TaskResource
    {
        $task = Task::query()->findOrFail($id);
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id): TaskResource
    {
        $validatedData = $request->validated();
        $task = Task::query()->findOrFail($id);

        $task->update($validatedData);
        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $task = Task::query()->findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Task successfully deleted.']);
    }

    public function completeTask(Task $task): JsonResponse
    {
        abort_if($task->state === TaskState::COMPLETED, 403, 'Task is already completed');
        (new MarkCompleted)->handle($task);
        return response()->json(['message' => 'Task successfully completed.']);
    }
    public function deleteTask(Task $task): JsonResponse
    {
        abort_if($task->state === TaskState::DELETED, 403, 'Task is already deleted');
        (new DeleteTask)->handle($task);
        return response()->json(['message' => 'Task successfully deleted.']);
    }
}
