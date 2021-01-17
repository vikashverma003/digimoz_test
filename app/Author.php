<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

 public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
