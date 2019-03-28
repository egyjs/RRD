<?php


namespace App\Http\Controllers\Dash;

use App\Hr;
use App\Http\Controllers\Controller;
use App\RegisterCode;
use App\Roles;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Functions as Func;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Faker\Generator as Faker;

class UsersController extends Controller
{

    public function __construct(Request $r){
        $this->middleware('auth');
    }

    public function allView(){
        auth()->user()->authorizeRoles(['Users manager','manager']);  //->hasRole('Users manager');
        $users = User::where('id', '!=', Auth::user()->id)->
            where('id', '!=', User::first()->id)->get();
        return view('dash.users',compact('users'));
    }

    public function change(Request $request){
        auth()->user()->authorizeRoles(['Users manager','manager']);  //->hasRole('Users manager');
        if ($request->isMethod("POST")):
            $user = User::findOrFail($request->id);
            $user
                ->roles()
                ->attach(Roles::where('name', $request->type)->first());
        endif;
    }

    public function delete(Request $r,$id)
    {
        auth()->user()->authorizeRoles(['Users manager','manager']);  //->hasRole('Users manager');
        User::destroy($id);
        return redirect()->back()->with(['statues'=>"success","msg"=>"Successfully Deleted The User"]);
    }

    public function UnGrantAccess(Request $request)
    {
        auth()->user()->authorizeRoles(['Users manager','manager']);  //->hasRole('Users manager');
        $userID = $request->id;
        $roleID = $request->role;
        DB::table('roles_user')->where([
            ['roles_id',$roleID],
            ['user_id',$userID]
        ])->delete();

        if(DB::table('roles_user')->where('user_id',$userID)->count() == 0)
        {
            $user = User::findOrFail($userID);
            $user
                ->roles()
                ->attach(Roles::where('name', "user")->first());
        }

    }

}
