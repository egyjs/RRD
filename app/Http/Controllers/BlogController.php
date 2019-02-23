<?php

namespace App\Http\Controllers;


use App\Post;
use App\Social;
use App\User;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('statues', 1)->get();
        $pageTitle = "Blog";
        return view('blog.home', compact('posts','pageTitle'));
    }

    public function postid($id)
    {
        $post = Post::where([['id', $id,['statues', 1]]]);
        if ($post->count() > 0):
            $pageTitle = $post->first()->title;
            return redirect()->route('blog.post',str_replace(' ', '-',$pageTitle."-$id"));
        else:
            abort(404);
        endif;
    }

    public function post($title)
    {
        $post = Post::where('slug', $title)->firstOrFail();
        if (isset($post)):

            $description =$post->description;
            $keywords = implode(', ',$post->tagNames());
            $image =  (isset(json_decode($post->imgs)[0]))? url(json_decode($post->imgs)[0]):'https://i.imgur.com/KKr6qP8.png';


            $creator= Social::where('by',User::find($post->by)->id)
                ->where('url', 'like', '%twitter.com%')
                ->first();
            if ($creator != null) {
                preg_match("/http(s):\/\/twitter.com\/(#!\/)?([^\/]*)/", $creator->url, $creator);
                $creator = '@' . end($creator);
            }else{
                $creator = '@cascocode';
            }
            return view('blog.post',["pageTitle"=>$title,'post'=>$post,'description'=>$description,'keywords'=>$keywords,'image'=> $image,'creator'=>$creator]);
        else:
            abort(404);
        endif;
    }
}
