<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function district()
	{
		return $this->belongsTo('App\District');
	}
	public function type()
	{
		return $this->belongsTo('App\Type');
	}

	public function products()
	{
		return $this->hasMany('App\Product');
	}

	public function categories()
	{
		return $this->hasMany('App\Category');
	}
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
