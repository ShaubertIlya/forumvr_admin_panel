<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEvent extends Model
{
    public function event()
    {
        return $this->hasOne(Event::class, 'id', 'available_event_id');
    }
}
