<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;
use MGBoateng\EloquentSlugs\Slugging;


/**
 * @property mixed imgs
 * @method static where($string, $int)
 */
class Post extends Model
{
    use Taggable;
    use Slugging;

    protected $slugSettings = [
        'source' => 'title',
        'destination' => 'slug',
        'seperator' => '-'
    ];


    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where("statues", '=', 1);
    }

    public function writer(){
       return $this->belongsTo(User::class,'by');
    }

    public function getThumbnailAttribute()
    {
        $thumbnail = (isset(json_decode($this->imgs)[0])) ? json_decode($this->imgs)[0] : 'https://i.imgur.com/KKr6qP8.png';
        return $thumbnail;
    }
}
