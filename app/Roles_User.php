<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles_User extends Model
{
    protected $table = 'roles_user';
    public $timestamps = false;
    protected $fillable = ['roles_id','user_id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
