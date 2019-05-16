<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'slug', 'body', 'status'
    ];


    public function tags(){

        return $this->belongsToMany('App\Tag', 'App\TagPost')->withTimestamps();
    
    }

    public function categories(){

        return $this->belongsToMany('App\Category', 'App\CategoryPost')->withTimestamps();
    
    }

    public function getRouteKeyName(){

        return 'slug';

    }
}
