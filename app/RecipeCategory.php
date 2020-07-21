<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{
    public function recipes()
	{
		return $this->hasMany('App\Recipe');
	}
}
