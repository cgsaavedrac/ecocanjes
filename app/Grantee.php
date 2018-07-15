<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exchange;

class Grantee extends Model
{
    public function exchange_grantees(){
    	return $this->hasMany(Exchange::class);
    }
}
