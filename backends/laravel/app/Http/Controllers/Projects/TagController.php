<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Tag::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2',
        ]);

        return response()->json([
            'data' => Tag::create($request->safe()->all()),
        ]);
    }

    public function show(Tag $tag)
    {
        return response()->json([
            'data' => $tag,
        ]);
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'sometimes|string|min:2',
        ]);

        $tag->update(
            $request->safe()->all()
        );

        return response()->json([
            'data' => $tag->fresh(),
        ]);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}
