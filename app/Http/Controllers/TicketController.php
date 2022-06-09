<?php

namespace App\Http\Controllers;

use App\ticket;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = app(Pipeline::class)
            ->send(ticket::query())
            ->through([
                \App\QueryFilters\Available::class,
                \App\QueryFilters\SortByPrice::class,
                \App\QueryFilters\SortByDepartTime::class,
            ])
            ->thenReturn()
            ->paginate(10);

        return view('index', compact('tickets'));
    }
}
