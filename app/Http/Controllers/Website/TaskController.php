<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Task;

use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('query');
        $userId = auth()->user()->id;
        $tasks = Task::where('user_id', $userId)
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('due_date', 'like', '%' . $query . '%');
            })
            ->get();

        return view('website.task.index', compact('tasks'));
    }

    public function create()
    {
        return view('website.task.create');
    }

    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = Auth::id();

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('website.task.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('website.task.edit', compact('task'));
    }

    public function update(UpdateRequest $request, Task $task)
    {
        $validatedData = $request->validated();

        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
