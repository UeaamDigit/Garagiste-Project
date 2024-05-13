<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'reparation_id', 'client_id', 'total_amount',
    ];

    public function reparation()
    {
        return $this->belongsTo('App\Reparation');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
