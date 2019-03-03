<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//$domin = config("app.domain");



// Public Routes
Route::group(['middleware' => ['Visitor']], function () {
    Route::get('/', "HomeController@soon")->name('home');
    Route::get('/home', "HomeController@index")->name('home');


    // Sitemap Routes
    Route::group(['prefix' => "sitemap.xml"], function () {
        Route::get('/', 'SitemapController@index')->name('sitemap.index');
        Route::get('/posts', 'SitemapController@posts')->name('sitemap.posts');
        Route::get('/projects', 'SitemapController@projects')->name('sitemap.projects');
    });



    // Blog Routes
    Route::group(['prefix'=>"blogs"],function (){
        Route::get("/","BlogController@index")->name('blog');
        Route::get("/{title}","BlogController@post")->name('blog.post');
    });

    // Projects Routes
    Route::group(['prefix'=>"projects"],function (){
        Route::get("/", "HomeController@allProjects")->name('projects');
        Route::get('/{slug}', 'HomeController@singleProject')->name('project.post');
    });

    // Auth Routes
    Auth::routes();
    Route::get('register/{id?}', 'Auth\RegisterController@showRegistrationForm')->name('register');

    // Error Routes
    Route::view("UnAuthorizedUser", 'pages.notAllowed')->name("notAllowed");

});


// Dashboard Routes
Route::group(["namespace"=>'Dash',"domain"=>$domin],function(){
    Route::prefix('dashboard')->group(function (){
        //Dashboard Homepage
        Route::get('/','DashController@index')->name('dash.home');


        // Visits Details
        Route::get('/visit','DashController@visits')->name('dash.visits');




        // Profile Routes
        Route::get('/profile','DashController@profile')->name('dash.profile');
        Route::post('/profile','DashController@profileEdit')->name('dash.editprofile');



        // Projects Routes
        Route::get('/add/project', 'ProjectsController@addpro')->name('dash.add.project');
        Route::post('/add/project', 'ProjectsController@handleadd')->name('dash.addpro.p');

        Route::get('/view/project','ProjectsController@allProjectsView')->name('dash.view.project');
        Route::get('/delete/project/{id}',"ProjectsController@deleteProject")->name('dash.deleteproject');

        Route::get('edit/project/{id}','ProjectsController@viewEdit')->name('dash.edit.project');
        Route::patch('/edit/project/{id}',"ProjectsController@handleEdit")->name('dash.editproject');





        // Pages Routes
        Route::get('/add/page', 'PageController@addPage')->name('dash.add.page');
        Route::post('/add/page', 'PageController@handleadd')->name('dash.addpage.p');
        Route::get('/view/page', 'PageController@allProjectsView')->name('dash.view.pages');
        Route::get('/delete/page/{id}',"PageController@delete")->name('dash.deletepg');
        Route::get('edit/page/{id}','PageController@viewEdit')->name('dash.edit.page');
        Route::patch('edit/page/{id}',"PageController@handleEdit")->name('dash.editpg');


        // Posts Routes
        Route::get('/add/post', 'PostsController@addPost')->name('dash.add.post');
        Route::post('/add/post', 'PostsController@handleadd')->name('dash.addpost.p');
        Route::get('/view/post', 'PostsController@allPostsView')->name('dash.view.posts');
        Route::get('/delete/post/{id}',"PostsController@delete")->name('dash.deletepost');
        Route::get('edit/post/{id}','PostsController@viewEdit')->name('dash.edit.post');
        Route::patch('edit/post/{id}',"PostsController@handleEdit")->name('dash.editpost');



        Route::post("changePass", "DashController@changePass")->name("dash.change.pass");


        Route::get('/component/Users',"ComponentsController@Users")->name('dash.component.users');

        Route::get("/user/mange","UsersController@allView")->name("dash.mange.users");
        Route::post("/user/change","UsersController@change")->name("dash.change.user.type");
        Route::delete('/user/delete/{id}',"UsersController@delete")->name('dash.user.delete');
        Route::post("/user/role/delete","UsersController@UnGrantAccess")->name("dash.user.role.delete");

    });
});

// Error Routes
Route::view("UnAuthorizedUser",'pages.notAllowed')->name("notAllowed");



