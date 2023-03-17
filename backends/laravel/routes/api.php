<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/status', 'App\Http\Controllers\StatusController')
    ->name('api.status');

Route::resource('projects', 'App\Http\Controllers\ProjectController')
    ->middleware('auth:sanctum')
    ->except(['create', 'edit']);

Route::resource('projects.tags', 'App\Http\Controllers\Projects\TagController')
    ->middleware('auth:sanctum')
    ->except(['create', 'edit']);

Route::resource('projects.tasks', 'App\Http\Controllers\Projects\TaskController')
    ->middleware('auth:sanctum')
    ->except(['create', 'edit']);

Route::resource('projects.users', 'App\Http\Controllers\Projects\UserController')
    ->middleware('auth:sanctum')
    ->except(['create', 'edit', 'update']);
