<?php

namespace App\Http\Middleware\ItemsMid;

use Closure;
use App\Stage;
use App\Item;

class GetItemPosition
{
    /**
     * Agrega el ID del stage obteniendolo de la URL
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $stage_id = Stage::where('url', $request->stage_url)->first()->id;
        $items = Item::where('stage_id', $stage_id)->orderBy('position', 'desc')->get();
        

        //Si el curso no tiene stages
        if($items->count() <= 0) $request['position'] = 1;
        
        //Si el curso tiene stages
        else
        {
            $lastPosition = $items->first()->position;
            $request['position'] = $lastPosition + 1;
        }

        //Agrega ID del curso al request
        $request['stage_id'] = $stage_id;

        return $next($request);
    }
}
