<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Project::all(),
        ]);
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create(
            $request->safe()->all()
        );

        return response()->json([
            'data' => $project,
        ]);
    }

    public function show(Project $project)
    {
        return response()->json([
            'data' => $project,
        ]);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update(
            $request->safe()->all()
        );

        return response()->json([
            'data' => $project->fresh(),
        ]);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}
