<?php

namespace App;

use App\Models\Post;
use App\Models\Roles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
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

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function role()
    {
        return $this->belongsToMany(Roles::class);
    }

    public function HasRole($role){
        if($this->role()->where('name', $role)->first()){
            return true;
        }
        return false;
    }

    public function HasManyRoles($roles){
        if($this->role()->whereIn('name',$roles)->first()){
            return true;
        }
        return false;
    }
}
