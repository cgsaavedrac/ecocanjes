<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MachineLocation;

class City extends Model
{
    public function machine_locations(){
    	return $this->hasMany(MachineLocation::class);
    }
}
