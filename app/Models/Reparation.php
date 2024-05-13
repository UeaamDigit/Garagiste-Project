<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function mechanic()
    {
        return $this->belongsTo(Mechanic::class);
    }
}
