<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessInformation extends Model
{
    protected $fillable = [
        'main_presentation_link', 'company_visitcard', 'model3d_link', 'gallery_link',
        'additional_presentation_links', 'videoclip_links', 'gallery_links'
    ];

    protected $casts = [
        'additional_presentation_links' =>'json',
        'videoclip_links' =>'json',
        'gallery_links' =>'json',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'business_information_id', 'id');
    }
}
