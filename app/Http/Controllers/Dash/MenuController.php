<?php
namespace App\Http\Controllers\Dash;

use App\Hr;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Functions;
use App\RegisterCode;

use App\User;
use App\UserView;
use App\Visits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

use ZanySoft\Zip\Zip;

class MenuController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function add(){

        return view('dash.add.menu');
    }
}
