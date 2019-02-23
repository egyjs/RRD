<?php

namespace App\Http\Controllers;

use App\Post;
use App\Project;
use Conner\Tagging\Model\Tag;
use Conner\Tagging\Model\Tagged;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {

        // POSTS
        $posts = Post::latest('updated_at')
            ->first();
        if($posts){
            $sitemaps[] = array(
                'loc' => route('sitemap.posts'),
                'lastmod' => $posts->updated_at->tz('UTC')->toAtomString(),
            );
        }

        // PROJECTS
        $pro = Project::latest('updated_at')
            ->first();
        if($pro){
            $sitemaps[] = array(
                'loc' => route('sitemap.projects'),
                'lastmod' => $pro->updated_at->tz('UTC')->toAtomString(),
            );
        }


        return response()->view('sitemap.index', [
            'sitemaps' => $sitemaps,
        ])->header('Content-Type', 'text/xml');
    }

    public function posts(){ // as google news

        $posts = Post::orderBy("updated_at", "desc")
            ->orderBy("id", "desc")
            ->take(1000)
            ->get();
        return response()->view('sitemap.posts', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }

    public function projects()
    {
        $projects = Project::orderBy("updated_at", "desc")
            ->orderBy("id", "desc")
            ->take(50000)// each Sitemap file must have no more than 50,000 URLs and must be no larger than 10MB
            ->get();
        return response()->view('sitemap.projects', [
            'projects' => $projects,
        ])->header('Content-Type', 'text/xml');
    }
}
