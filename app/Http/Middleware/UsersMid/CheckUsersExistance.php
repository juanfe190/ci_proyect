<?php

namespace App\Http\Middleware\UsersMid;

use Closure;
use App\User;

class CheckUsersExistance
{
    /**
     * Revisa que el usuario a editar o eliminar exista
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param   String  tipo de request (por username o id)
     * @return mixed
     */
    public function handle($request, Closure $next, $param)
    {   
         switch($param){
            case "username":
                if(User::where('username', $request->username)->count() > 0) return $next($request);
                break;

            case "id":
                if(User::find($request->id)) return $next($request);
                break;

            case "email":
                if(User::where('email', $request->email)->count() > 0) return $next($request);
                break;
         }
        return redirect()->route('users.index')->withErrors(['message'=>'Se est&aacute intentando editar un usuario inexistente']);
    }    
}
