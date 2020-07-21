<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
	{
		return $this->belongsTo('App\Category');
	}
	 public function store()
	{
		return $this->belongsTo('App\Store');
	}

	 public function provider()
	{
		return $this->belongsTo('App\Provider');
	}

	public function cart()
	{
		return $this->hasOne('App\Cart');
	}
	public function orderproduct()
	{
		return $this->hasMany('App\OrderProduct');
	}
	
}
