<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\TariffPlan;
use App\Stand;
use App\Http\Resources\ReferencesResource;

class ReferencesController extends Controller
{
    public function events()
    {
        return ReferencesResource::collection(Event::all());
    }

    public function stands()
    {
        return ReferencesResource::collection(Stand::all());
    }

    public function tariffPlans()
    {
        return ReferencesResource::collection(TariffPlan::all());
    }
}
