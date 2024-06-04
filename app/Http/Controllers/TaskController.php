<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskStatus;
use Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = TaskStatus::all();
        $tasks = Task::where('user_id', Auth::id())->paginate(10);

        return view('pages.task-manager')
            ->withStatuses($statuses)
            ->withTasks($tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:tasks|max:100',
            'content' => 'required',
            'task_status_id' => 'required',
            'file' => 'max:4000'
        ]);

        $task = new task;

        $task->title = $request->title;
        $task->content = $request->content;
        $task->task_status_id = $request->task_status_id;
        $task->user_id = Auth::id();
        if ($request->image) {
            $filename = $request->image;
            $filenameImage = date('YmdHis') . '.' . $request->image->extension();
            $filename->move(public_path('/uploads/task-image'), $filenameImage);

            $task->image = $filenameImage;
        }


        $task->save();

        return redirect()->route('task.index')->with('success', 'Task has been successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $statuses = TaskStatus::all();

        return view('pages.edit-task')
            ->withTask($task)
            ->withStatuses($statuses);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->title = $request->title;
        $task->task_status_id = $request->task_status_id;
        $task->content = $request->content;

        $task->save();

        return redirect()->route('task.index')->with('success', 'Task has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task, $id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('task.index')->with('success', 'Task has been successfully deleted');
    }
}
