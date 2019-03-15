<?php

namespace App\Http\Controllers;

use App\{
    Post, Project, User, Visits
};
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\DocBlock;

class HomeController extends Controller
{

    public function index()
    {
        $slides = Project::orderBy('id', 'desc')->limit(3)->get();
        $pros = Project::inRandomOrder()->limit(7)->get();
        $posts = Post::paginate(8);
        $singlePost_widget= Post::orderBy('id', 'desc')->first();

        $pageTitle = "Home";
        return view('welcome')->with(compact('pros','posts', 'slides',"pageTitle",'singlePost_widget'));
    }

    public function soon()
    {
        return view('layouts.soon');
    }

    public function singleProject($slug)
    {

        $pro = Project::where('slug', $slug)->firstOrFail();


        $pageTitle = $pro->title ;


        $description = $pro->description;
        $keywords = implode(', ', $pro->tagNames());
        $image = $pro->thumbnail;

        $creator = '';
        $next = Project::where('id', '>', $pro->id)->first();
        $perv = Project::where('id', '<', $pro->id)->first();


        return view("pro.post", compact("pro", 'pageTitle', 'keywords', 'description', 'image', 'creator','next','perv')); //
    }

    public function services(){
        $servs = Service::all();
        $pageTitle = "Our Services";
        return view('services',compact('servs',"pageTitle"));
    }

    public function allProjects()
    {
        $pros = Project::simplePaginate(15);
        $pageTitle = "Projects";
        return view('pro.home', compact('pros', 'pageTitle'));
    }

    public function tag($tag){
        $posts = Post::withAnyTag([$tag])->get();
        $projects = Project::withAnyTag([$tag])->get();


        $description = "$tag - Search Results";
        $keywords = "Search, $tag";
        $pageTitle = "Search Results [ $tag ]";

        return view('pages.search',compact('tag','pageTitle','keywords','posts','projects','description'));
    }


}
