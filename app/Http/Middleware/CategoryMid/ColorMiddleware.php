<?php

namespace App\Http\Middleware\CategoryMid;

use Closure;

class ColorMiddleware
{
    /**
     * Verifica que el codigo del color inicie con '#' y 
     * luego lo elimina para ser almacenado
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $color = $request->color_code;
        if(strpos($color, '#') !== 0) return back()->withErrors(['message'=>'Codigo de color incorrecto']);
        $color = ltrim($color, '#');

        $request["color_code"] = $color;
        return $next($request);
    }
}
