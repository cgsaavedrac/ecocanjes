<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Machine;
use App\City;

class Region extends Model
{
    public function machines()
    {
    	return $this->hasMany(Machine::class);
    }

    public function cities(){
    	return $this->hasMany(City::class);
    }

}
