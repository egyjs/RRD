<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Functions;
use Illuminate\Http\Request;
use \App\Project;
use Illuminate\Support\Facades\Auth;


class ProjectsController extends Controller
{

    public function __construct(Request $r)
    {
        $this->middleware('auth');
    }
    // add =
    public function addpro()
    {
        auth()->user()->authorizeRoles(['manager','employee']);
        return view('dash.add.project');
    }

    // view =
    public function allProjectsView(){
        auth()->user()->authorizeRoles(['manager','employee']);
        if (Auth::user()->hasRole('manager')):
            $projects = Project::all();
        else:
            $projects = Project::where('by',Auth::user()->id)->get();
        endif;
            $pageTitle = "All Projects";
        return view('dash.view.project',compact('projects',"pageTitle"));
    }

    public function handleadd(Request $req){
        auth()->user()->authorizeRoles(['manager','employee']);
        $validatedData = $req->validate([
            'protitle' => 'required|max:255',
            'giturl' => 'url',
            'demourl'=> 'url',
            'prolang'=>"required",
            'procont' => 'required',
        ]);
        $cont = $req->input("procont");
        $imgs = Functions::getImgFromString($cont);
        $thepath = 'projects/imgs/';
        $urls = Functions::upload($thepath,$imgs);
        for ($x = 0;$x < count($imgs); $x++ ){
            $cont = str_replace($imgs[$x]['src'],$urls[$x],$cont);
        }
        $pro = new Project();
        $pro->title = $req->protitle;
        $pro->language = $req->prolang;
        $pro->by = Auth::user()->id;
        $pro->byname = Auth::user()->fullname;
        $pro->description = $req->prodesc;
        $pro->content = $cont;
        $pro->imgs = json_encode($urls);
        $pro->demoUrl = $req->demourl;
        $pro->gitUrl = $req->giturl;
        $pro->save();
        $pro->tag($req->keyword);
        return redirect(route('dash.view.project'))->with(['statues'=>"success","msg"=>"Successfully Added Your Project To Database"]);
    }

    public function viewEdit($id){
        auth()->user()->authorizeRoles(['manager','employee']);
        $pro = Project::findOrFail($id);
        return view('dash.edit.project',compact('pro'));
    }

    public function deleteProject ($id){
        auth()->user()->authorizeRoles(['manager','employee']);
        Project::destroy($id);
        return redirect(route('dash.view.project'))->with(['statues'=>"danger",'msg'=>'Successfully deleted Project']);
    }

    public function handleEdit($id,Request $req){
        auth()->user()->authorizeRoles(['manager','employee']);
        $validatedData = $req->validate([
            'protitle' => 'required|max:255',
            'giturl' => 'url',
            'demourl'=> 'url',
            'prolang'=>"required",
            'procont' => 'required',
        ]);
        $cont = $req->input("procont");
        $imgs = Functions::getImgFromString($cont);
        $thepath = 'projects/imgs/';
        $urls = Functions::upload($thepath,$imgs);
        for ($x = 0;$x < count($imgs); $x++ ){
            $cont = str_replace($imgs[$x]['src'],$urls[$x],$cont);
        }
        $pro = Project::find($id);
        $pro->title = $req->protitle;
        $pro->language = $req->prolang;
        $pro->description = $req->prodesc;
        $pro->content = $cont;
        $pro->imgs = json_encode($urls);
        $pro->demoUrl = $req->demourl;
        $pro->gitUrl = $req->giturl;
        $pro->retag($req->keyword);
        $pro->save();
        return redirect(route('dash.view.project'))->with(['statues'=>"success","msg"=>"Successfully Updated Your Project In Database"]);
    }


}
