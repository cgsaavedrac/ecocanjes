<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Grantee;

class Exchange extends Model
{
    public function user(){
    	return $this->belongsTo(User::class);
    }

}
