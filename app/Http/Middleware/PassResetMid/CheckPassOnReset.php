<?php

namespace App\Http\Middleware\PassResetMid;

use Closure;
use App\PassReset;
use Hash;

class CheckPassOnReset
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
        if($passResetInfo = PassReset::find($request->id)){
            $oldPass = $request->old_password; //Desde el form
            $newPass = $request->new_password; //Desde el form
            $storedPass = $passResetInfo->password; //Desde la BD

            if(Hash::check($oldPass, $storedPass)) return $next($request);
        }
        return back()->withErrors('true');
    }
}
