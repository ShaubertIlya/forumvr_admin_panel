<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    protected $casts = [
        'video_urls' =>'json',
    ];
}
