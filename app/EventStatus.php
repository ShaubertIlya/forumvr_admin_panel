<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// TODO unused model, remove this.
class EventStatus extends Model
{
    public $timestamps = false;

    protected $fillable = ['event_id', 'name_en', 'name_ru', 'name_kz'];
}
