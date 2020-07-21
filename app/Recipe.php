<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function recipecategory()
	{
		return $this->belongsTo('App\RecipeCategory');
	}
}
