<?php

namespace App;

use App\Post;
use App\Role;
use App\Photo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','photo_id',
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

    //relationship between user and profile photo
    public function photo(){
        return $this->belongsTo(Photo::class);
    }
    public function post(){
        return $this->hasMany(Post::class);
    }
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function getInitialStatus($user) {

        if(empty($this->status) || $this->status=="0"){
            return "Blocked";
        }
        return "Not Blocked";
    }

    public function userStatus($user){
        return $this->status;
    }

}
