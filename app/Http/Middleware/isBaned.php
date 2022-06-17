<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isBaned
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
        if (Auth::user()->isBanded == 1){
            Auth::logout();
            return redirect()->route("login")->with('alert',['icon'=>'error','title'=>'you are baned','message'=>'contact admin']);
        }
        return $next($request);
    }
}
