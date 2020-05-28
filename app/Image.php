<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = [
        'post_id',
        'name',
    ];
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
