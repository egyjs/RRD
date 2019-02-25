<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1)
 */
class Roles extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
