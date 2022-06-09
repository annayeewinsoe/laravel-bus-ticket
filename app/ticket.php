<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    protected $guarded = [];

    public function from()
    {
        return $this->belongsTo('App\town', 'from_id');
    }

    public function to()
    {
        return $this->belongsTo('App\town', 'to_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
