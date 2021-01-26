<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    public function profile()
    {
        return $this->hasOne(Profile::class,'author_id','id');
    }

 public function posts()
    {
        return $this->hasMany(Post::class,'author_id','id');
    }
}



