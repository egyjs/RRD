<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Site Config
    |--------------------------------------------------------------------------
    |
    |
    */

    'short_desc' => env('APP_DESCRIPTION', 'Site Description'),
    'long_desc' => NULL,
    'menu' =>[ /* use `url()` helper with names */
        "Home"=> "/",
        "Blog"=> "blogs",
        "Projects"=> "projects",
        "Pages"=> "true"
    ],
      "social"=>[
    "facebook" => NULL,
    "twitter" => NULL,
    "instagram" => NULL,
]

];
