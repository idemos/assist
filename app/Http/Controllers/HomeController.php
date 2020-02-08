<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function userTaskIndex(Request $request){

        $user_tasks = User::with('tasks')->find($request->user_id);
        $tasks = Task::all();
        $user = User::find($request->user_id);

        return view('page.user_task',compact('user_tasks','tasks','user'));

    }

    public function userTaskStore(Request $request){

/*        
        $request->validate([
            'user_id' => 'required|integer',
            'task_id' => 'required|integer',
        ]);
*/

        //dd($request->task_id);
        

        // User::find($request->user_id)->tasks()->save($tasks);
        $user = User::find($request->user_id);
        $user->tasks()->sync($request->task_id);
        // User::find($request->user_id)->tasks()->saveMany($request->task_id);


        return redirect()->route('user.index')->with('success', 'You have successfully sync the tasks');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page = (auth()->user()->type == 1 ? 'page.home' : 'page.workfromhome_index');
        return view($page);
    }
}
