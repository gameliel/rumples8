<?php

namespace App\Http\Middleware\admintrunk;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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

    if(Auth::check()){

            if(Auth::user()->user_type == 'adm')
            {
                return $next($request);
            }
            else
            {
                return redirect('/home')->with('status', 'Access Denied');
            }
        }
        else
        {
            return redirect('/home')->with('status', 'please login first');
        }
    }
}
