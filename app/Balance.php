<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\MovementType;

class Balance extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function movement_type()
    {
    	return $this->belongsTo(MovementType::class);
    }
}
