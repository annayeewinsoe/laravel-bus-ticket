<?php

namespace App\QueryFilters;

use Closure;

class Available
{
    public function handle($request, Closure $next)
    {
        if( !request()->has('available') ) {
            return $next($request);
        }
        $builder = $next($request);
        return $builder->where('available', request('available'));
    }
}