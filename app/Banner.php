<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public function getUrlAttribute(){
    	if(substr($this->image, 0, 4) === 'http'){
    		return $this->image;
    	}

    	return '/images/banners/' . $this->image;
    }
}
