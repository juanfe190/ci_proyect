<?php

namespace App\Http\Middleware\StagesMid;

use Closure;
use App\Stage;
use App\Course;

class GetStagePosition
{
    /**
     * Agrega la posicion del stage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $course_id = Course::where('url', $request->course_url)->first()->id;
        $stages = Stage::where('course_id', $course_id)->orderBy('position', 'desc')->get();
        

        //Si el curso no tiene stages
        if($stages->count() <= 0) $request['position'] = 1;
        
        //Si el curso tiene stages
        else
        {
            $lastPosition = $stages->first()->position;
            $request['position'] = $lastPosition + 1;
        }

        //Agrega ID del curso al request
        $request['course_id'] = $course_id;

        return $next($request);
    }
}
