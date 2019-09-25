<?php

namespace App\Http\Middleware;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Closure;

class Master
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
        $user = Auth::user();
        if ($user->role != "master") {
            return Redirect::to('/admin');
        }
        return $next($request);
    }
}
