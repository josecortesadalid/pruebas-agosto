<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function getBodyAttribute($body)
    {
        return \Purify::clean($body); // Se limpiaría cada vez que se use {!! $post->body !!}
    }
}
