<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TariffPlan extends Model
{
    public function getNameAttribute()
    {
        $postfix = '_'. app()->getLocale();

        return data_get($this, 'tarifplan_name'.$postfix);
    }
}
