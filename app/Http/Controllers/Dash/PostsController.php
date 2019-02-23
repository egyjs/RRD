<?php

namespace App\Http\Controllers\Dash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Controllers\Functions;

class PostsController extends Controller
{
    public function __construct(Request $r)
    {
        $this->middleware('auth');
    }

    public function addPost()
    {
        auth()->user()->authorizeRoles(['manager','employee','writer']);
        return view("dash.add.Post");
    }

    public function allPostsView()
    {
        auth()->user()->authorizeRoles(['manager','employee','writer']);
        $Posts = Post::all();
        $PostTitle = "All Posts";
        return view('dash.view.Posts', compact('Posts', "PostTitle"));
    }

    public function handleadd(Request $req)
    {
        auth()->user()->authorizeRoles(['manager','employee','writer']);
        $validatedData = $req->validate([
            'PostTitle' => 'required|max:255',
            'Postcont' => 'required',
        ]);

        if ($req->statues == "on"):
            $statues = 1;
        else:
            $statues = 0;
        endif;
        $Post = new Post();
        $cont = $req->input("Postcont");
        $imgs = Functions::getImgFromString($cont);
        $thepath = 'posts/imgs/';
        $urls = Functions::upload($thepath, $imgs);
        for ($x = 0; $x < count($imgs); $x++) {
            $cont = str_replace($imgs[$x]['src'], $urls[$x], $cont);
        }
        $Post->title = $req->PostTitle;
        $Post->description = $req->Postdesc;
        $Post->content = $cont;
        $Post->statues = $statues;
        $Post->by = auth()->user()->id;
        $Post->imgs = json_encode($urls);
        $Post->save();
        $Post->retag($req->keyword);

        return redirect(route('dash.view.posts'))->with(['statues' => "success", "msg" => "Successfully Added Post To Database"]);
    }

    public function delete($id)
    {
        auth()->user()->authorizeRoles(['manager','employee','writer']);
        Post::destroy($id);
        return redirect(route('dash.view.posts'))->with(['statues' => "danger", 'msg' => 'Successfully deleted Post']);

    }


    public function viewEdit($id)
    {
        auth()->user()->authorizeRoles(['manager','employee','writer']);
        $pg = Post::findOrFail($id);
        return view('dash.edit.Post', compact('pg'));
    }


    public function handleEdit($id, Request $req)
    {
        auth()->user()->authorizeRoles(['manager','employee','writer']);
        $validatedData = $req->validate([
            'PostTitle' => 'required|max:255',
            'Postcont' => 'required'
        ]);
        if ($req->statues == "on"):
            $statues = 1;
        else:
            $statues = 0;
        endif;
        $Post = Post::find($id);
        $cont = $req->input("Postcont");
        $imgs = Functions::getImgFromString($cont);
        $thepath = 'Posts/imgs/';
        $urls = Functions::upload($thepath, $imgs);
        for ($x = 0; $x < count($imgs); $x++) {
            $cont = str_replace($imgs[$x]['src'], $urls[$x], $cont);
        }
        $Post->title = $req->PostTitle;
        $Post->slug = $Post->title;
        $Post->description = $req->Postdesc;
        $Post->content = $cont;
        $Post->statues = $statues;
        $Post->imgs = json_encode($urls);
        $Post->retag($req->keyword);
        $Post->save();
        return redirect(route('dash.view.posts'))->with(['statues' => "success", "msg" => "Successfully Updated Your Post","type"=>"updated"]);
    }
}
