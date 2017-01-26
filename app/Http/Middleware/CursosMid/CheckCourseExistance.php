<?php

namespace App\Http\Middleware\CursosMid;

use Closure;
use App\Course;

class CheckCourseExistance
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
                if(Course::where('url', $request->url)->count() > 0) return $next($request);
                break;

            case "id":
                if(Course::find($request->id)) return $next($request);
                break;
         }
        return redirect()->route('courses.index')->withErrors(['message'=>'Se está intentando editar un curso inexistente']);
    }
}
