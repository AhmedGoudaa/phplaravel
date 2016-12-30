<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class adminstrator
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
       $user= $request->user();
        if ($user && $user->name=='ali')
        {
            return $next($request);

        }
        if ($user){
            Auth::logout();
        }
        return redirect()->guest('login');
//        abort(404,'No fuckin way');

    }
}
