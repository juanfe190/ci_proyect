<?php

namespace App\Http\Middleware\AuthMid;

use Closure;
use Auth;
use App\PassReset;

class AfterLogin
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
        $response = $next($request);

        if(!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], false)){
            return back()->withErrors('true')->withInput();
        }
        return $response;
    }
}
