<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Machine;

class MachineLocation extends Model
{
    public function machine()
    {
    	return $this->belongsTo(Machine::class);
    }
}
