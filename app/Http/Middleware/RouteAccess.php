<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
class RouteAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Request::is('super/*') == Request::url())
        {
            if (!in_array(Auth::user()->role_id, explode(',', unserialize(permission)[3])))
            {
                return redirect()->route('unauthorised');
            }
        }
        elseif(Request::is('user/*') == Request::url())
        {
            if (!in_array(Auth::user()->role_id, explode(',', unserialize(permission)[2])))
            {
                return redirect()->route('unauthorised');
            }
        }
        elseif(Request::is('editor/*') == Request::url())
        {
            if (!in_array(Auth::user()->role_id, explode(',', unserialize(permission)[1])))
            {
                return redirect()->route('unauthorised');
            }
        }
        elseif(Request::is('writer/*') == Request::url())
        {
            if (!in_array(Auth::user()->role_id, explode(',', unserialize(permission)[0])))
            {
                return redirect()->route('unauthorised');
            }
        }
        return $next($request);
    }
}
