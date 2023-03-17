<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Project;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Project $project)
    {
        return response()->json([
            'data' => $project->tasks,
        ]);
    }

    public function store(StoreTaskRequest $request, Project $project)
    {
        $task = $project->tasks()->create(
            $request->safe()->except('tags')
        );

        $task->tags()->attach(
            $request->safe()->only('tags')
        );

        return response()->json([
            'data' => $task->fresh(),
        ]);
    }

    public function show(Project $project, Task $task)
    {
        return response()->json([
            'data' => $task,
        ]);
    }

    public function update(UpdateTaskRequest $request, Project $_project, Task $task)
    {
        $task->update(
            $request->safe()->all()
        );

        return response()->json([
            'data' => $task->fresh(),
        ]);
    }

    public function destroy(Project $_project, Task $task)
    {
        $task->delete();

        return response()->json([
            'data' => $task,
        ]);
    }
}
