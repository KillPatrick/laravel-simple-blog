<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function posts(){

            return $this->belongsToMany('App\Post', 'App\TagPost')
                ->orderBy('created_at', 'DESC')
                ->where('status', 1)
                ->paginate(5);

    }

    public function getRouteKeyName(){

        return 'slug';

    }
}
