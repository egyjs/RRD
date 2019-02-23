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
        if ($id):
            $data = Hr::where('id', $id)->first();
            return view('auth.register', compact('data'));
        else:
            return view('auth.register');
        endif;


    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {

        return Validator::make($data, [
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|alpha_dash|unique:users',
            "RegisterCode" => "required",
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
        if (RegisterCode::where([
                ['code', $data['RegisterCode']
                    ,['statues', 1]]])->count() !== 1):
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'RegisterCode' => ['The Code You Entered Is Wrong'],
            ]);
            throw $error;
        else:
            // Set Statues => used To Registered Code
            RegisterCode::where("code", $data['RegisterCode'])->update(['statues' => 1]);

            // Send Email To Notice User That He has Registered
            config(['mail.username' => "admin@cascocode.com", 'mail.password' => "admin@1234"]);
            // Adding User To DataBase And Redirect HIm To Dashboard
            $role_employee = Roles::where('name', 'client')->first();
            $user = new User();
            $user->fullname = $data['fullname'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();
            $user->roles()->attach($role_employee);
            return $user;
        endif;
    }

}
