<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Machine;
use App\City;

class MachineLocation extends Model
{
    public function machine()
    {
    	return $this->belongsTo(Machine::class);
    }

    public function city(){
    	return $this->belongsTo(City::class);
    }
}
