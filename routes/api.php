<?php

use App\Http\Controllers\TodosApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('todos', [TodosApiController::class, 'index'])
    ->middleware('auth:sanctum')
    ->name(name: 'todos.index');

Route::post('todos', [TodosApiController::class, 'store'])
    ->middleware('auth:sanctum')
    ->name(name: 'todos.store');

Route::put('todos/{todo}', [TodosApiController::class, 'update'])
    ->middleware('auth:sanctum')
    ->name(name: 'todos.update');

