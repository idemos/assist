<?php

namespace App\Http\Controllers;

use App\User;
use App\Workfromhome;
use Illuminate\Http\Request;

class WorkfromhomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        if($user->type == 1){
            $Workfromhome = Workfromhome::with('user')->get();
        }else{
            $Workfromhome = Workfromhome::with('user')->where('user_id', $user->id)->get();
        }

        if($request->ajax()){
            return $Workfromhome;
        }

        return view('page.workfromhome_index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('page.workfromhome_create', compact('users'));
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
        $request->validate([
            'request_date' => 'required|date|after:start_date|date_format:"Y-m-d"'
        ]);

        $aUser = ['user_id' => auth()->user()->id,'request_date' => $request->request_date];

        Workfromhome::create($aUser);
        
        return redirect(route('workfromhome.index'))->with('success','You have successfully insert data.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Workfromhome  $workfromhome
     * @return \Illuminate\Http\Response
     */
    public function show(Workfromhome $workfromhome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Workfromhome  $workfromhome
     * @return \Illuminate\Http\Response
     */
    public function edit(Workfromhome $workfromhome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Workfromhome  $workfromhome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workfromhome $workfromhome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Workfromhome  $workfromhome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workfromhome $Workfromhome)
    {
        //
        Workfromhome::find($Workfromhome->id)->delete();
        //return redirect(route('user_index'));
    }
}
