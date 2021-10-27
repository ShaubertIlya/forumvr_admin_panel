<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiLocalization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = ($request->hasHeader('x-locale')) ? $request->header('x-locale') : env('APP_LOCALE', 'ru');
        app()->setLocale($locale);

        return $next($request);
    }
}
