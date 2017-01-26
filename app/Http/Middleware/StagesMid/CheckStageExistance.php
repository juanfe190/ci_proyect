<?php

namespace App\Http\Middleware\StagesMid;

use Closure;
use App\Stage;

class CheckStageExistance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $param)
    {
         switch($param){
            case "url":
                if(Stage::where('url', $request->url)->count() > 0) return $next($request);
                break;

            case "id":
                if(Stage::find($request->id)) return $next($request);
                break;
         }
        return redirect()->route('stages.index', ['course_url'=>$request->course_url])->withErrors(['message'=>'Se est&aacute intentando editar una etapa inexistente']);
    }
}
