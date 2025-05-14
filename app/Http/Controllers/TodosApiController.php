<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosApiController extends Controller
{
    public function index(){
        $todos = auth()->guard()->user()->todos()->get();  // fixed as per the instruction from copilot by using guard() method
        // $todos = auth()->user()->todos()->get(); // this line was incorrect as per the instruction from copilot

        return response()->json([
            'todos' => $todos,
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $todo = auth()->guard()->user()->todos()->create([          // fixed as per the instruction from copilot by using guard() method
            // $todo = auth()->user()->todos()->create([ // this line was incorrect as per the instruction from copilot
            'title' => $request->input(key: 'title'),
        ]);

        return response()->json([
            'todo' => $todo,
        ]);
    }

    public function update(Request $request, Todo $todo){
        $request->validate([
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
