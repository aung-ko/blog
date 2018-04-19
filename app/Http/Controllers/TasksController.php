<?php

namespace App\Http\Controllers;

use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task)// must be primary key
    {
        // $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }
}
