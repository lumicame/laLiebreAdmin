<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
     public function stores()
	{
		return $this->hasMany('App\Store');
	}
}
