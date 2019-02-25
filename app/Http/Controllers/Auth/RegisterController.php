<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Hr;
use App\RegisterCode;
use App\Roles;
use Illuminate\Support\Facades\Mail;


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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm($id = null)
    {
            switch ($id) {
                case "a":
                    $data['r'] = 1;
                    break;
                case "b":
                    $data['r'] = 2;
                    break;
                case "c":
                    $data['r'] = 3;
                    break;
                default:
                    $data['r'] = 4;
            }
            return view('auth.register', compact('data'));

    }

    protected function validator(array $data)
    {

        return Validator::make($data, [
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|alpha_dash|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */


    protected function create(array $data)
    {
            // Send Email To Notice User That He has Registered
            config(['mail.username' => "admin@cascocode.com", 'mail.password' => "admin@1234"]);
            // Adding User To DataBase And Redirect HIm To Dashboard
            $user = new User();
            $user->fullname = $data['fullname'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();
            $user->role()->insert(['roles_id'=>$data['r'],'user_id'=>$user->id]);

        return $user;
    }

}
