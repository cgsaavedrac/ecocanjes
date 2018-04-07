<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Balance;

class MovementType extends Model
{
    public function balances()
    {
    	return $this->hasMany(Balance::class);
    }
}
