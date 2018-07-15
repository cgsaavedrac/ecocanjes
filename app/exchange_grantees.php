<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grantee;

class exchange_grantees extends Model
{
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function grantee(){
    	return $this->belongsTo(Grantee::class);
    }
}
