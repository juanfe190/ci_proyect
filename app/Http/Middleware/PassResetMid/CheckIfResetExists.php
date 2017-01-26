<?php

namespace App\Http\Middleware\PassResetMid;

use Closure;
use App\PassReset;

class CheckIfResetExists
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
        if(PassReset::find($request->id)) return $next($request);
        return redirect()->route('showLogin');
    }
}
