<?php

namespace App\Http\Middleware\ItemsMid;

use Closure;
use App\Item;
use App\ItemType;
use App\Http\Utilities\StringUtil;

class GenerateItemCode
{
    const DASH = '-';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $itemType = ItemType::find($request['item_type_id']);
        do{
            $itemCode = $itemType->pre_code.self::DASH.StringUtil::getRandomString();
            $items = Item::where('item_code', $itemCode)->first();
            if(empty($items)){
                $request['item_code'] = $itemCode;
                break;
            }
        }while(true);

        return $next($request);
    }
}
