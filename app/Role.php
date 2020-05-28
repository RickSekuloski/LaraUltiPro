<?php

namespace App;
use App\User;
use App\Admin;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function admins(){
        return $this->belongsToMany(Admin::class);
    }
}
