<?php

namespace App\Http\Middleware\RolesMid;

use Closure;
use App\Rol;

class CheckRolesExistence
{
    /**
     * Revisa que el rol a editar o eliminar exista
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param   String  tipo de request (por nombre o id)
     * @return mixed
     */
    public function handle($request, Closure $next, $param)
    {   
        if($param==="name"){
            if(Rol::where('rol_name', $request->name)->count() > 0) return $next($request);
        }else{
             if(Rol::find($request->id)) return $next($request);
         }
        return redirect()->route('roles.index')->withErrors(['message'=>'Se est&aacute intentando editar un rol inexistente.']);
    }
}
