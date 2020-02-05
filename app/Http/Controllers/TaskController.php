<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Task;
=======
use App\task;
>>>>>>> 66d5173b4e5748509443a636b9f8eae48bf476e6
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
<<<<<<< HEAD
        $task = Task::all();
        return view('page.task_index',compact('task'));
=======
>>>>>>> 66d5173b4e5748509443a636b9f8eae48bf476e6
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
<<<<<<< HEAD
        return view('page.task_create');
=======
>>>>>>> 66d5173b4e5748509443a636b9f8eae48bf476e6
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $request->validate([
            'name' => 'required|min:2'
        ]);

        Task::create($request->except(['method','csrf']));
        
        $page = 'task_index';
        if(!empty($request->addNewOne)){
            $page = 'task_new';
        }

        return redirect(route($page));
=======
        //
>>>>>>> 66d5173b4e5748509443a636b9f8eae48bf476e6
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function show(Task $task)
=======
    public function show(task $task)
>>>>>>> 66d5173b4e5748509443a636b9f8eae48bf476e6
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function edit(Task $task)
    {
        //
        return view('page.task_edit',compact('task'));
=======
    public function edit(task $task)
    {
        //
>>>>>>> 66d5173b4e5748509443a636b9f8eae48bf476e6
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function update(Request $request, Task $task)
    {
         $request->validate([
            'name' => 'required|min:2|unique:task'
        ]);

        Task::update($request->except(['method','csrf']));
        
        return redirect(route('task_index'));
=======
    public function update(Request $request, task $task)
    {
        //
>>>>>>> 66d5173b4e5748509443a636b9f8eae48bf476e6
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function destroy(Task $task)
    {
        //
        Task::find($task->id)->delete();
        return redirect(route('task_index'));
=======
    public function destroy(task $task)
    {
        //
>>>>>>> 66d5173b4e5748509443a636b9f8eae48bf476e6
    }
}
