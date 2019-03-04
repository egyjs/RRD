<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Functions;

class PageController extends Controller
{
    public function __construct(Request $r)
    {
        $this->middleware('auth');
    }

    public function addPage()
    {
        auth()->user()->authorizeRoles(['manager','employee','writer']);
        return view("dash.add.page");
    }

    public function allProjectsView()
    {
        auth()->user()->authorizeRoles(['manager','employee','writer']);
        $pages = Page::all();
        $pageTitle = "All Pages";
        return view('dash.view.pages', compact('pages', "pageTitle"));
    }

    public function handleadd(Request $req)
    {
        auth()->user()->authorizeRoles(['manager','employee','writer']);
        $validatedData = $req->validate([
            'pagetitle' => 'required|max:255',
            'pagecont' => 'required',
            'pagedesc' => 'required',
        ]);

        if ($req->statues == "on"):
            $statues = 1;
        else:
            $statues = 0;
        endif;
        $cont = $req->input("pagecont");
        $imgs = Functions::getImgFromString($cont);
        $thepath = 'pages/imgs/';
        $urls = Functions::upload($thepath, $imgs);
        for ($x = 0; $x < count($imgs); $x++) {
            $cont = str_replace($imgs[$x]['src'], $urls[$x], $cont);
        }
        $page = new Page();
        $page->title = $req->pagetitle;
        $page->description = $req->pagedesc;
        $page->content = $cont;
        $page->statues = $statues;
        $page->imgs = json_encode($urls);
        $page->save();
        $page->tag($req->keyword);
        return redirect(route('dash.view.pages'))->with(['statues' => "success", "msg" => "Successfully Added Page To Database"]);
    }

    public function delete($id)
    {
        auth()->user()->authorizeRoles(['manager','employee','writer']);
        Page::destroy($id);
        return redirect(route('dash.view.pages'))->with(['statues' => "danger", 'msg' => 'Successfully deleted Page']);

    }


    public function viewEdit($id)
    {
        auth()->user()->authorizeRoles(['manager','employee','writer']);
        $pg = Page::findOrFail($id);
        return view('dash.edit.page', compact('pg'));
    }

    public function handleEdit($id, Request $req)
    {
        auth()->user()->authorizeRoles(['manager','employee','writer']);
        $validatedData = $req->validate([
            'pagetitle' => 'required|max:255',
            'pagecont' => 'required'
        ]);
        if ($req->statues == "on"):
            $statues = 1;
        else:
            $statues = 0;
        endif;
        $cont = $req->input("pagecont");
        $imgs = Functions::getImgFromString($cont);
        $thepath = 'pages/imgs/';
        $urls = Functions::upload($thepath, $imgs);
        for ($x = 0; $x < count($imgs); $x++) {
            $cont = str_replace($imgs[$x]['src'], $urls[$x], $cont);
        }
        $page = Page::find($id);
        $page->title = $req->pagetitle;
        $page->description = $req->pagedesc;
        $page->content = $cont;
        $page->statues = $statues;
        $page->imgs = json_encode($urls);
        $page->retag($req->keyword);
        $page->save();
        return redirect(route('dash.view.pages'))->with(['statues' => "success", "msg" => "Successfully Updated Your Page","type"=>"updated"]);
    }
}
