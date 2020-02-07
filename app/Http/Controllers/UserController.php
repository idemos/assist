<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user = User::all();

        if($request->ajax()){
            return $user;
        }


        return view('page.user_index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('page.user_create');
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
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|string|email|max:100|unique:users',
        ]);

        if($request['type'] == 1){
            $aValidate['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }

        User::create($request->except(['_token','_method']));
        
        $page = 'user.index';
        if(!empty($request->addNewOne)){
            $page = 'user.new';
        }

        return redirect(route($page))->with('success', 'You have successfully created a User.');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('page.user_edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
         $request->validate([
            'name' => 'required|min:2|unique:user'
        ]);

        User::update($request->except(['method','csrf']));
        
        return redirect(route('user_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        User::find($user->id)->delete();
        return redirect(route('user_index'));
    }
}
