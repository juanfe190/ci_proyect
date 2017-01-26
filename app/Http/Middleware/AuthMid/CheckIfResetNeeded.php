<?php

namespace App\Http\Middleware\AuthMid;

use Closure;
use Hash;
use App\User;
use App\PassReset;


class CheckIfResetNeeded
{
    /**
     * Revisa si la clave que se ingreso se encuentra en la tabla 'password_reset'
     * y que es valido con su respectivo email
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $email = $request->email;
        $passReset = PassReset::where('email', $email);

        if($passReset->count() > 0){
            $storedPass =$passReset->first()->password;

            if(Hash::check($request->password, $storedPass)){
                return redirect()->route('passreset.index', $passReset->first()->id);
            }
        }
        return $next($request);
    }
}
