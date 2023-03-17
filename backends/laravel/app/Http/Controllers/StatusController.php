<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json([
            'status' => 'ok',
        ]);
    }
}
