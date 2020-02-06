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
        $task = Task::all();
        return view('task_index',compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('page.task_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2'
        ]);

        Task::create($request->except(['method','csrf']));
        
        $page = 'task_index';
        if(!empty($request->addNewOne)){
            $page = 'task_new';
        }

        return redirect(route($page));
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        return view('page.task_edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
         $request->validate([
            'name' => 'required|min:2|unique:task'
        ]);

        Task::update($request->except(['method','csrf']));
        
        return redirect(route('task_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
        Task::find($task->id)->delete();
        return redirect(route('task_index'));
    }
}
