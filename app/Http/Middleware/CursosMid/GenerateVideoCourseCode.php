<?php

namespace App\Http\Middleware\CursosMid;

use Closure;
use App\Course;
use App\Http\Utilities\StringUtil;

class GenerateVideoCourseCode
{

    const VIDEO_PRE_CODE = 'video-';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        do{
            $videoCode = self::VIDEO_PRE_CODE.StringUtil::getRandomString();
            $courses = Course::where('video_code', $videoCode)->first();
            if(empty($courses)){
                $request['video_code'] = $videoCode;
                break;
            }
        }while(true);

        return $next($request);
    }
}
