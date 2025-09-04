<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('team_id', auth()->user()->currentTeam->id)->orderBy('due_date', 'asc')->simplepaginate(10);

        return view('tasks.index', [
            'tasks' => $tasks, 'users' => User::all()
        ]);
    }

     public function create()
    {
        return view('tasks.create', [
            'users' => User::all()
        ]);
    }

    public function show(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required'],
            'due_date' => ['required', 'date', 'after:today'],
            'assigned_to' => ['nullable', 'exists:users,id'],
            'is_completed' => ['nullable', 'boolean']

        ]);

        $task = Task::create([
            'user_id' => auth()->id(),
            'team_id' => auth()->user()->currentTeam->id,
            'title' => request('title'),
            'description' => request('description'),
            'due_date' => request('due_date'),
            'assigned_to' => request('assigned_to'),
            'is_completed' => request('is_completed')
        ]);

        return redirect('/tasks')->with('success', 'Task created successfully.');
    }


     public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task], [
            'users' => User::all()
        ]);
    }

    public function update(Task $task)
    {
        Gate::authorize('edit', $task);

        request()->validate([
           'title' => ['required', 'min:3'],
            'description' => ['required'],
            'due_date' => ['required', 'date', 'after:today'],
            'assigned_to' => ['nullable', 'exists:users,id'],
            'is_completed' => ['nullable', 'boolean']
        ]);

        $task->update([
            'title' => request('title'),
            'description' => request('description'),
            'due_date' => request('due_date'),
            'assigned_to' => request('assigned_to'),
            'is_completed' => request('is_completed')
        ]);

        return redirect('/tasks/' . $task->id);
    }

    public function destroy(Task $task)
    {
        Gate::authorize('edit', $task);

        $task->delete();

        return redirect('/tasks')->with('success', 'Task deleted successfully.');
    }



}
