<?php
namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Functions;

use App\User;
use App\Visits;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Redirect;
use ZanySoft\Zip\Zip;

class DashController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $visits = Visits::all()->count();
        return view('dash.index', compact('visits'));
    }

    public function visits(){
        $v = Visits::orderBy('created_at', 'desc')->paginate(10);
        $vCount = Visits::all()->count();
//        dd($v);
        return view('dash.visits', ['v' => $v, 'vCount' => $vCount]);

    }


    public function profile(){
        $profile = Auth::user();

        @$userTimeZone = Functions::userTimezone();


        $pageTitle = $profile->fullname;
        return view("dash.profile" ,compact("profile","userTimeZone","pageTitle"));
    }

    public function profileEdit(Request $rq){
                   $profile = User::findOrFail(Auth::user()->id);



        // string
        $profile->fullname = $rq->fullname;
        $profile->email    = $rq->email;
        if($profile->username != $rq->username) {
            if(File::exists(public_path('disk/cvView/'.$profile->username))) {
                rename(public_path('disk/cvView/'.$profile->username), public_path('disk/cvView/'.$rq->username));
            }
            $profile->username = $rq->username;
        }

        $profile->fullname = $rq->fullname;



        //files
        if (request()->hasFile('cover')) {
            $coverFile = request()->file('cover');

            $coverPath = "profile/$rq->username/cover/";
            $coverName =  time().".". $coverFile->getClientOriginalExtension();

            $coverFile->move($coverPath, $coverName);

            $profile->cover =  url($coverPath.$coverName);

        }
        if (request()->hasFile('pic')) {
            $picFile = request()->file('pic');

            $picPath = "profile/$rq->username/pic/";
            $picName =  time().".". $picFile->getClientOriginalExtension();

            $picFile->move($picPath, $picName);
            $profile->img =  url($picPath.$picName);
        }


        $profile->save();

        $pageTitle = $profile->fullname." | Done Edit";
        return redirect(route("dash.profile"));
    }

    public function changePass(Request $request)
    {
        $old = $request->old;
        $new = bcrypt($request->new);
        $id = Auth::user()->id;
        if (Hash::check($old, User::find($id)->password)):
            $user = User::find($id);
            $user->password = $new;
            $user->save();
            return redirect()->to(route('dash.home'))->with(['msg' => "password changed successfully", 'statues' => "success"]);
        else:
            return redirect()->to(route('dash.home'))->withErrors(["Password does not match", "Please try again"]);
        endif;
    }

    public function settings(){

        auth()->user()->authorizeRoles(['Users manager','manager']);  //->hasRole('Users manager');
        return view('dash.settings');
    }
    public function settings_submit(Request $r){
        $siteFilePath = base_path('config/site.php');

        auth()->user()->authorizeRoles(['Users manager','manager']);  //->hasRole('Users manager');
        $socials = array_combine($r->social_name,$r->social_url);
        $menus = array_combine($r->menu_name,$r->menu_url);


        envUpdate(['APP_NAME'=>$r->siteTitle]);

        $site = array();
        $req= $r->except(['_token','social_name','social_url','menu_name','menu_url','siteTitle']);
        foreach($req as $key=>$value){
            $site[$key]= $value;
        }
        $site['menu'] = $menus;
        $site['social'] = $socials;

        config::set(['site'=>$site]);


//        dd(config('site'));
        $fp = fopen(($siteFilePath), 'w');
        fwrite($fp, '<?php return ' . var_export(config('site'), true) . ';');
        fclose($fp);
        Artisan::call('config:cache');

        Auth()->logout();

        return redirect(route('login'))->with('status', 'every thing is updated!');
    }

}
