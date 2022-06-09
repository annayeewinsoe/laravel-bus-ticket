<?php

namespace App\QueryFilters;

use Closure;

class SortByDepartTime
{
    public function handle($request, Closure $next)
    {
        if( !request()->has('sort_by_depart_time') ) {
            return $next($request);
        }
        $builder = $next($request);
        return $builder->orderBy('depart_time', request('sort_by_depart_time'));
    }
}