<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RecyclingRecord;
use App\Region;
use App\City;

class Machine extends Model
{
    public function region()
    {
    	return $this->belongsTo(Region::class);
    }

    public function city()
    {
    	return $this->belongsTo(City::class);
    }

    public function recycling_records(){
        return $this->hasMany(RecyclingRecord::class);
    }

    public function scopeSearch($query, $name){
        return $query->where('terminal_number', 'LIKE', "%$name%")->orWhere('address', 'LIKE', "%$name%")->orWhere('created_at', 'LIKE', "%$name%");
    }

}
