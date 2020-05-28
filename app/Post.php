<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Post extends Model
{
    //


    use Sluggable;

    protected $fillable = [
        'title',
        'body',
        'slug',
    ];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    //relation between post and user
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function image(){
        return $this->hasMany(Image::class);
    }
}
