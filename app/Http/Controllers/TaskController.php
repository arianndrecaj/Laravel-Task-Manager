<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('status')) {
            session(['status' => $request->status]);
        }
        if ($request->has('priority')) {
            session(['priority' => $request->priority]);
        }

        $tasks = Task::where('user_id', auth()->id()); 

        if (session('status') !== null) {
            $tasks->where('status', session('status'));
        }

        if (session('priority') !== null) {
            $tasks->where('priority', session('priority'));
        }

        $tasks = $tasks->get();

        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required'
        ]);

        auth()->user()->tasks()->create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function edit(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to edit this task.');
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to update this task.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required'
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->has('status') ? 1 : 0,
            'priority' => $request->priority,
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to delete this task.');
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
