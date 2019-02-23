<?php


namespace App\Http\Controllers;

use App\User;
use App\UserView;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Functions;

class UserController extends Controller
{
    /**
     * @param $username
     * @param null $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function index($username, $page = null)
    {
        $domain = config('app.domain');
        ($domain == "localhost" ? $domain = "localhost:8000": $domain = config('app.domain'));
        $user = User::where('username', $username)->firstOrFail();
        $id = $user->id;
        //dd($id);
        $userVlast = UserView::where('by', $id)->orderBy('created_at', 'desc')->first();
        $pageTitle = $user->fullname;
        $username = $user->username;
        $apiUrl = $domain . "/api/users/$username";
        if ($userVlast == null) {
            return view('pages.noUserView', compact('pageTitle', "apiUrl",'username'));
        }else{
             $path = substr($userVlast->file, 0,strrpos($userVlast->file, '/'));


            /**
             * pages:
             */
             if($page == null){
                 $html = File::get(public_path('/storage/cvView/'.$username.'/'.$userVlast->file));
             }else{
                 try {
                     $html = File::get(public_path('/disk/cvView/' . $username . '/' . "$path/$page.html"));
                 }catch (\Exception $e) {
                     abort(404);
                 }
             }
             $srchtml = Api::theme($html,$username,$path);
             return $srchtml;
        }
    }

}
