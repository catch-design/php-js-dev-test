<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Profile - for the profiles
 *
 */
class Profile extends Model
{
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = true;

	/**
	 * The company
	 *
	 */
	public function company(){
		return $this->belongsTo('App\Company');
	}

}
