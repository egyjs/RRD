<?php

namespace App;

use App\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed id
 * @property mixed fullname
 * @property mixed username
 * @property mixed email
 * @property string password
 * @method static where(string $string, $email)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'username', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        $this->hasMany(Post::class,'id');
    }

    public function role()
    {
        return $this->hasMany(Roles_User::class);
    }

    public function roles(){
        return $this->belongsToMany(Roles::class);
    }


    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }


    // Check multiple roles

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    // Check one role

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }


    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPassword($token));
    }


}
