<?php

namespace App\Http\Controllers;


use App\Page;
use App\Post;

class PageController extends Controller
{
    public function index()
    {
        $posts = Post::where('statues', 1)->get();
        $pageTitle = "Blog";
        return view('blog.home', compact('posts', 'pageTitle'));
    }


    public function page($slug = null)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        $pageTitle = $page->title;

        $description = $page->description;
        $keywords = implode(', ', $page->tagNames());
        $image = $page->thumbnail;

        $creator = "@".username(config('site.social.twitter'));
        if (isset($page)):
            return view("viewpage", compact("page", 'pageTitle', 'keywords', 'description', 'image', 'creator')); //

        else:

        endif;
    }
}
