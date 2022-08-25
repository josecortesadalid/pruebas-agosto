<?php

namespace App\Models;

use App\Providers\PostCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dispatchesEvents = [ // emparejamos el evento de eloquent con un evento propio
        'created' => PostCreated::class
    ];
}
