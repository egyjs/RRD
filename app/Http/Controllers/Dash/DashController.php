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

    public function viewCodes(){
        $codes = RegisterCode::all();
        return view('dash.codes',compact('codes'));
    }

    public function addCode(){
        $code = rand(500,99999);
        RegisterCode::create(['code'=>$code,"statues"=>0]);
        return $code;
    }

    public function removeCodes($id){
        RegisterCode::destroy($id);
        return redirect()->back()->with(['statues'=>"success","msg"=>"Successfully Deleted The Code"]);
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

    public function CVview()
    {
        $userVlast = UserView::where('by', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        $path = null;
        if ($userVlast != null){
            $path = substr($userVlast->file, 0,strrpos($userVlast->file, '/'));
            if(!file_exists("storage/cvView/".\auth()->user()->username."/".$path."/screenshot.jpg")):
                $screen = asset('main/img/web-ui.svg');
            else:
                $screen = url('/storage/cvView/' . Auth::user()->us1ername . '/' . "$path/screenshot.jpg");
            endif;
        }
        return view('dash.cvview',compact("screen","path"));
    }
    
    public function AddCVview(Request $request){
        $request->validate([
            'html-zip' => 'required|file',
        ]);

        if ($request->hasFile('html-zip')) {
            $zip = $request->file('html-zip');
            $name = $zip->getClientOriginalName();
            $noEXE = str_replace(".zip","",$zip->getClientOriginalName());
            $destination = "/cvView/".Auth::user()->username;
            $zipPath = storage_path('app/public'.$destination.'/'.  $name);
            $destinationPath = storage_path('app/public'.$destination);
            $zip->storeAs($destination, $name,'public');
            $zipfile = Zip::open($zipPath);

            if (empty(Functions::search("php",$zipfile->listFiles()))){
                if (in_array("index.html", $zipfile->listFiles($zipPath))) {
                    mkdir("$destinationPath/$noEXE", 0777, true);
                    $zipfile->extract("$destinationPath/$noEXE");
                    $indexPath = "$noEXE/index.html";

                } else{
                    if (Functions::search("index.html",$zipfile->listFiles())){
                        $indexPath = Functions::search("index.html",$zipfile->listFiles());
                        $zipfile->extract($destinationPath);
                        $indexPath = reset($indexPath);
                    }

                }
                unlink($zipPath);

                $usrVu = new UserView();
                $usrVu->by = Auth::user()->id;
                $usrVu->file = $indexPath;
                $usrVu->save();
                return back();
            }else{
                unlink($zipPath);
                return back()->withErrors(["The compressed file should not contain any back-end files like php "]);
            }


        }


    }

}
