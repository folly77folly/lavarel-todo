<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::where("isCompleted", false)->orderBy("id", "DESC")->simplePaginate(5);
        $tasks_page = Task::where("isCompleted", false)->paginate(10);
        $completedTask = Task::where("isCompleted", true)->simplePaginate(5);
        return view("home", compact("tasks", "completedTask", "tasks_page" ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            "task"=> ["required", "string"]
            ]);
        $task = $request["task"];
        $isCompleted = 0;
        $newTask = new Task();
        $newTask->task_name = $task;
        $newTask->isCompleted = 0;
        $newTask->save();
        return redirect()->back()->with("message", "Task Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->back()->with("message", "Task Deleted Successfully");
    }

    public function complete($id)
        {
        $task = Task::find($id);
        $task->isCompleted = true;
        $task->save();
        return redirect()->back()->with("message", "Task has been added to completed list");
        }
}
