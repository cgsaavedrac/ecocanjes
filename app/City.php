<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Machine;
use App\Region;

class City extends Model
{
    public function machines(){
    	return $this->hasMany(Machine::class);
    }

    public function region(){
    	return $this->belongsTo(Region::class);
    }

    public static function cities($id){
    	return City::where('region_id', '=', $id)->get();
    }
}
