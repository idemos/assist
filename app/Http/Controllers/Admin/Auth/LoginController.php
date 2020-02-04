<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    public function showLoginForm()
    {
        return view('admin.auth.login');
    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);


        if ($this->guard()->attempt($request->only('email', 'password'))) {
            return redirect(route('admin_home'));
            //->with('success','You have successfully upload image.');
            //$this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
