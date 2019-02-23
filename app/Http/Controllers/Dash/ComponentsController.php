<?php

namespace App\Http\Controllers\Dash;

use App\Hr;
use App\Http\Controllers\Controller;
use App\RegisterCode;
use App\User;
use Illuminate\Http\Request;

class ComponentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function RegisterCodesTable(){
        $codes = RegisterCode::all();
        return view('dash.components.registerCodesTable',compact('codes'));
    }

    public function HrsTable(){
        $requests = Hr::all();
        return view('dash.components.HrsTable',compact('requests'));
    }

    public function Users(){
        $users = User::whereNotIn('role',[0])->get();
        return view('dash.components.Users',compact('users'));
    }
}
