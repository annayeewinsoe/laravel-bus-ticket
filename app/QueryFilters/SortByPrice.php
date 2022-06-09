<?php

namespace App\QueryFilters;

use Closure;

class SortByPrice
{
    public function handle($request, Closure $next)
    {
        if( !request()->has('sort_by_price') ) {
            return $next($request);
        }
        $builder = $next($request);
        return $builder->orderBy('price', request('sort_by_price'));
    }
}