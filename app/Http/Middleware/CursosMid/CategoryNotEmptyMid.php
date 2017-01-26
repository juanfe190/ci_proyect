<?php

namespace App\Http\Middleware\CursosMid;

use Closure;
use App\Category;

class CategoryNotEmptyMid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Category::all()->count() > 0) return $next($request);

        return redirect()->route('courses.index')->withErrors(['message'=>'No existen categor&iacuteas registradas.']);
    }
}
