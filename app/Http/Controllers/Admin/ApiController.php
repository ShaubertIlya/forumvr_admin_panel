<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AttachedUserEvent;
use App\Event;
use App\Stand;

class ApiController extends Controller
{
    public function standsByEvent(Request $request)
    {
        $q = data_get($request, 'q');

        $items = Stand::where('is_free', true)->where('is_active', true)->where('event_id', $q)->selectRaw('stand_name_ru as text')->addSelect('id')->get(['text', 'id']);

        return $items;
    }
}
