<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Project $project)
    {
        return response()->json([
            'data' => $project->users,
        ]);
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $project->users()->attach(
            $request->input('user_id')
        );

        return response()->json([
            'data' => User::find(
                $request->input('user_id')
            ),
        ]);
    }

    public function show(User $user)
    {
        return response()->json([
            'data' => $user,
        ]);
    }

    public function destroy(Project $project, User $user)
    {
        $project->users()->detach(
            $user->id
        );

        return response()->json([
            'success' => true,
        ]);
    }
}
