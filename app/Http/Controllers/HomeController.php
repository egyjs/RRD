<?php

namespace App\Http\Controllers;

use App\{
    Post, Project, Service, Social, User, Visits
};
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\DocBlock;

class HomeController extends Controller
{

    public function index()
    {
        $slides = Project::limit(3)->get();
        $pros = Project::inRandomOrder()->limit(7)->get();
        $posts = Post::paginate(6);
        $pageTitle = "Home";
        return view('welcome')->with(compact('pros','posts', 'slides',"pageTitle"));;
    }

    public function singleProject($slug)
    {

        $pro = Project::where('slug', $slug)->firstOrFail();
        @$userTimeZone = Functions::userTimezone();


        $pageTitle = $pro->title . ' | ' . $pro->writer->fullname;


        $description = $pro->description;
        $keywords = implode(', ', $pro->tagNames());
        $image = $pro->thumbnail;


        $creator = Social::where('by', User::find($pro->by)->id)
            ->where('url', 'like', '%twitter.com%')
            ->first();
        if ($creator != null) {
            preg_match("/http(s):\/\/twitter.com\/(#!\/)?([^\/]*)/", $creator->url, $creator);
            $creator = '@' . end($creator);
        } else {
            $creator = '@cascocode';
        }

        return view("pro.post", compact("pro", "userTimeZone", 'pageTitle', 'keywords', 'description', 'image', 'creator')); //
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

    public function page(){

    }

}
