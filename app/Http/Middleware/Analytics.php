<?php

namespace App\Http\Middleware;

use App\Events\CookieSave;
use Closure;
use Illuminate\Http\Request;
use Cookie;

class Analytics
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
        if (Cookie::get('utm_source') === null){
         return $next($request)->withCookie(cookie()->forever('utm_source',$request->utm_source))
                               ->withCookie(cookie()->forever('utm_medium',$request->utm_medium))
                               ->withCookie(cookie()->forever('utm_campaign',$request->utm_campaign))
                               ->withCookie(cookie()->forever('utm_id',$request->utm_id))
                               ->withCookie(cookie()->forever('utm_term',$request->utm_term))
                               ->withCookie(cookie()->forever('utm_content',$request->utm_content));
        }else{
            return $next($request);
        }

    }
}
