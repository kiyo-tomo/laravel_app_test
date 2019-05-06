<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_name',
        'user_id', 
        'image_url'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}