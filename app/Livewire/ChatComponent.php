<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ChatComponent extends Component
{
    public $todos = [];   
    public $key = null;
    public $messages = [];
    public $isTyping = false;
    
    public function mount()
    {
        $this->fetchTodos();
    }
 
    public function fetchTodos()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' .config(key: 'sanctum.token'),
        ])->get(url: 'http://todoapp.test/api/todos');

        $this->todos = $response->json(key: 'todos') ?? [];

    }

    public function toggleTodo($todoId)
    {
        $todoId = (int) $todoId;

        foreach ($this->todos as $key => $todo) {
            if ($todo['id'] === $todoId) {
                $this->todos[$key]['completed'] = !$todo['completed'];
                $this->key = $key;
                break;
            }
        }
        Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.config(key: 'sanctum.token'),
        ])->put('http://todoapp.test/api/todos/' .$todoId, [
            'completed' => $this->todos[$this->key]['completed'],
        ]);

    }

    public function render()
    {
        return view('livewire.chat-component');
    }
}
