<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return BelongsToMany
     */
    public function roles() {
        return $this->belongsToMany('App\Role');
    }

    /**
     * We will check if we have any role
     * @param $roles
     * @return bool
     */
    public function hasAnyRole($roles) {
        if($this->roles()->whereIn('name', $roles)->first()) {
            return true;
        }

        return false;
    }

    /**
     * We will check if we have a precise role
     *
     * @param $role
     * @return bool
     */
    public function hasRole($role) {
        if($this->roles()->where('name', $role)->first()) {
            return true;
        }

        return false;
    }
}
