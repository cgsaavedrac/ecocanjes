<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Machine;

class RecyclingRecord extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function machine()
    {
    	return $this->belongsTo(Machine::class);
    }
}
