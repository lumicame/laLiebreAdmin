<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     public function products()
	{
		return $this->hasMany('App\Product');
	}
	public function aisle()
	{
		return $this->belongsTo('App\Aisle');
	}
	public function store()
	{
		return $this->belongsTo('App\Store');
	}
}
