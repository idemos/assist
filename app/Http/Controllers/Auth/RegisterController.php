<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Notifications\UserCreatedNotification;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect(rounte('home'));
    }


    protected function validator(array $data)
    {

        //dd($data);
        $aValidate = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ];

        if($data['type'] == 1){
            $aValidate['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }

        return Validator::make($data, $aValidate);
    }


    protected function create(array $data)
    {
        
        $aUser = [
            'name' => $data['name'],
            'email' => $data['email'],
            'type' => $data['type'],
        ];
            
        $aUser['password'] = ($data['type'] == '1' ? Hash::make($data['password']) : Str::random(8));
        
        $user = User::create($aUser);

        if(!empty($data['type'])){
            $user->notify(new UserCreatedNotification());
        }

        return $user;

        //return redirect(route('home'));

    }
}
