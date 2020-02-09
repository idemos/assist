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

        if(empty($user)){
            return redirect()->route('home');
        }

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
        $request->validate([
            'request_date' => 'required|date|after:start_date|date_format:"Y-m-d"'
        ]);
        

        if(@auth()->user()->type !== 1){

            $now = time();
            $hour_deadline = '16:00:00';
            $hour_before_deadline = (4 * 360);

            $yesterday = strtotime($request->request_date) - 86400;
            $time_deadline = strtotime(date('Y-m-d', $yesterday) . ' '. $hour_deadline);
            $time_before_deadline = ($time_deadline - $hour_before_deadline);


            dd($now.' > '.$time_before_deadline);

            if($now > $time_before_deadline){
                $error = 'Sorry, A request mustbe made at least 4 hours before the end of the previous day';
            }
        }

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
    public function update(Request $request)
    {
            dd($request->id);
        $user = @auth()->user();
        /*
        $request->validate([
            'status' => 'required|min:0',
            'id' => 'required|min:1',
        ]);
*/
        

        //if($user->type === 1){


            Workfromhome::find($request->id)->update(['status' => $request->status]);
        //}

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
