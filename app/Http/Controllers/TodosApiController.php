<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;

class TodosApiController extends Controller
{
    public function index(){
        $todos = auth()->user()->todos()->get();

        return response()->json([
            'todos' => $todos,
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $todo = auth()->user()->todos()->create([
            'title' => $request->input(key: 'title'),
        ]);

        return response()->json([
            'todo' => $todo,
        ]);
    }

    public function update(Request $request, Todo $todo){
        $request->calidate([
            'completed' => 'required|boolean',
        ]);

        $todo->update([
            'completed' => $request->input(key: 'completed'),
        ]);

        return response()->json([
            'todo' => $todo,
        ]);
    }
}
