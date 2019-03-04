<?php

namespace App;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use MGBoateng\EloquentSlugs\Slugging;

/**
 * @property mixed imgs
 * @method static where($string, $slug)
 */
class Page extends Model
{
    use Taggable;
    use Slugging;

    protected $slugSettings = [
        'source' => 'title',
        'destination' => 'slug',
        'seperator' => '-'
    ];

    public function getThumbnailAttribute()
    {
        $thumbnail = (isset(json_decode($this->imgs)[0])) ? json_decode($this->imgs)[0] : 'https://i.imgur.com/KKr6qP8.png';
        return $thumbnail;
    }
}
