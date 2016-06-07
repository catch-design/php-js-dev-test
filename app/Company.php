<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //

	/**
	 * Profiles
	 *
	 */
	public function profiles(){
		return $this->hasMany('App\Profile');
	}

}
