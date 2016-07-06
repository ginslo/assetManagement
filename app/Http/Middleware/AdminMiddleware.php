<?php

namespace App\Http\Middleware;

use Closure;
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
    public function handle($request, Closure $next)
    {
      if (!Auth::guest() && Auth::user()->is_admin) {
        return $next($request);
      }elseif(Auth::guest()){
        return view('/')->with('message','You must be an admin to view that page.');
      }
      // return redirect('/');

      return redirect()->guest('login')->with('message','You must be logged in to view that page. Please log in or register now.');

    }
}
