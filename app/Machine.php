<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MachineLocation;
use App\RecyclingRecord;

class Machine extends Model
{
    public function machine_location()
    {
    	return $this->belongsTo(MachineLocation::class);
    }

    public function recycling_records(){
        return $this->hasMany(RecyclingRecord::class);
    }


}
