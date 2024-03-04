<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request){
        $query = Task::query()->latest('published_at');
        $validate = $request->validate([
            'completed' => ['nullable', 'boolean'],
            'from_date' => ['nullable', 'string', 'date'],
            'to_date' => ['nullable', 'string', 'date', 'after:from_date'],
        ]);
        if ($completed = $validate['completed'] ?? null) {
            $query->where('completed', $completed);
        }
        if ($from_date = $validate['from_date'] ?? null) {
            $query->where('published_at', '>=', new Carbon($from_date));
        }
        if ($to_date = $validate['to_date'] ?? null) {
            $query->where('published_at', '<=', new Carbon($to_date));
        }
        return $query->get();
    }

    public function store(Request $request){
        $validate = $request->validate([
            'title' => ['required', 'string', 'max:60'],
            'text' => ['nullable', 'string'],
            'completed' => ['nullable','boolean']
        ]);
        return Task::create($validate);
    }

    public function show($id)
    {
        return Task::findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:60'],
            'text' => ['nullable', 'string'],
            'completed' => ['nullable', 'boolean']
        ]);
        $task = Task::findOrFail($id);
        $task->update($validated);
        return $task;
    }
    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully']);
    }
}
