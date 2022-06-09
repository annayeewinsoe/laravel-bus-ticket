<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-4">
        <div>
            <h2>Bus Tickets</h2>
            <p>Result: {{ count($tickets) }}</p>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <form method="GET" id="filter_form">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <input type="checkbox" name="available" id="available" value="1" {{ str_contains(Request::fullUrl(), 'available=1') ? 'checked' : '' }}>
                            <span class="mx-1"></span>
                            <label for="available">Show Only Available</label>
                        </li>
                        <li class="list-group-item">
                            <input type="radio" name="sort_by_price" id="sort_by_price" value="asc" {{ str_contains(Request::fullUrl(), 'sort_by_price=asc') ? 'checked' : '' }}>
                            <span class="mx-1"></span>
                            <label for="sort_by_price">Sort By Price (Ascending)</label>
                        </li>
                        <li class="list-group-item">
                            <input type="radio" name="sort_by_price" id="sort_by_price_desc" value="desc" {{ str_contains(Request::fullUrl(), 'sort_by_price=desc') ? 'checked' : '' }}>
                            <span class="mx-1"></span>
                            <label for="sort_by_price_desc">Sort By Price (Descending)</label>
                        </li>
                        <li class="list-group-item">
                            <input type="radio" name="sort_by_depart_time" id="sort_by_depart_time" value="asc" {{ str_contains(Request::fullUrl(), 'sort_by_depart_time=asc') ? 'checked' : '' }}>
                            <span class="mx-1"></span>
                            <label for="sort_by_depart_time">Sort By Depart Time (Ascending)</label>
                        </li>
                        <li class="list-group-item">
                            <input type="radio" name="sort_by_depart_time" id="sort_by_depart_time_desc" value="desc" {{ str_contains(Request::fullUrl(), 'sort_by_depart_time=desc') ? 'checked' : '' }}>
                            <span class="mx-1"></span>
                            <label for="sort_by_depart_time_desc">Sort By Depart Time (Descending)</label>
                        </li>  
                    </ul>
                    <input type="submit" hidden>
                </form>
            </div>
            <div class="col-lg-9">
                <ul class="list-group">
                    @foreach($tickets as $ticket)
                        <li class="list-group-item p-4">
                            <div class="input-group d-flex my-1">
                                <div class="form-control flex-grow-1 text-wrap bg-secondary">From</div>
                                <div class="form-control flex-grow-1 text-wrap bg-secondary">To</div>
                                <div class="form-control flex-grow-1 text-wrap bg-secondary">Company</div>
                            </div>
        
                            <div class="input-group d-flex my-1">
                                <div class="form-control flex-grow-1 text-wrap">{{ $ticket->from->name }}</div>
                                <div class="form-control flex-grow-1 text-wrap">{{ $ticket->to->name }}</div>
                                <div class="form-control flex-grow-1 text-wrap">{{ $ticket->company->name }}</div>
                            </div>
        
                            <div class="input-group d-flex my-1">
                                <div class="form-control flex-grow-1 text-wrap bg-secondary">Depart Time</div>
                                <div class="form-control flex-grow-1 text-wrap bg-secondary">Price</div>
                                <div class="form-control flex-grow-1 text-wrap bg-secondary">Available</div>
                            </div>
        
                            <div class="input-group d-flex my-1">
                                <div class="form-control flex-grow-1 text-wrap">{{ $ticket->depart_time }}</div>
                                <div class="form-control flex-grow-1 text-wrap">{{ $ticket->price }}</div>
                                <div class="form-control flex-grow-1 text-wrap">
                                    @if($ticket->available === 1)
                                        <span class="badge text-bg-secondary">Yes</span>
                                    @else
                                        <span class="badge text-bg-light">No</span>
                                    @endif
                                </div>
                            </div>
                            
                        </li>
                    @endforeach

                    <br>
                    
                    {{ $tickets->appends(request()->input())->links() }}
                </ul>
            </div>
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script>
        $(function() {
            // Submit every time change event
            $.each($('#filter_form  input'), function() {
                $(this).on('change', function() {
                    $('#filter_form').submit()
                })
            })
        })
    </script>
  </body>
</html>