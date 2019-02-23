<?php

namespace App;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Taggable;

    public function getThumbnailAttribute()
    {
        $thumbnail = (isset(json_decode($this->imgs)[0])) ? json_decode($this->imgs)[0] : 'https://i.imgur.com/KKr6qP8.png';
        return $thumbnail;
    }
}
