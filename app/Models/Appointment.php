<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'client_id', 'vehicle_id', 'requested_datetime', 'vehicle_condition', 'status',
    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }
}
