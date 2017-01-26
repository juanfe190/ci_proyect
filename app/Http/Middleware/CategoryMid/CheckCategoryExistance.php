<?php

namespace App\Http\Middleware\CategoryMid;

use Closure;
use App\Category;

class CheckCategoryExistance
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
            case "url":
                if(Category::where('url', $request->url)->count() > 0) return $next($request);
                break;

            case "id":
                if(Category::find($request->id)) return $next($request);
                break;
         }
        return redirect()->route('categories.index')->withErrors(['message'=>'Se est&aacute intentando editar un usuario inexistente']);
    }    
}
