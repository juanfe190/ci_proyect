<?php

namespace App\Http\Middleware\RolesMid;

use Closure;
use App\Rol;

class CheckRolUserRelationship
{
    /**
     * Revisa si existe una relacion entre el rol que se esta tratando
     * y algun usuario. 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return  Avanza a RolController OR view (roles.index) con mensaje de error
     */
    public function handle($request, Closure $next)
    {
        $id = $request->id;
        $rol = Rol::find($id);
        if($rol->users()->count() <= 0) return $next($request);

        return redirect()->route('roles.index')->withErrors(['message'=>'No se pudo eliminar el rol de usuario <b>'. $rol->rol_name .'</b>, ya que hay usuarios con dicho rol.']);
    }
}
