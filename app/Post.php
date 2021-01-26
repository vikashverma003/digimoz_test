<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function author()
    {
        return $this->belongsTo(Author::class,'author_id','id');
    }

}
