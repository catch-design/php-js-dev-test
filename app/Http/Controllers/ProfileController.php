<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    /**
     * Show the installer options
     *
     * @return Response
     */
    public function showProfiles()
    {
        return view('profile.showprofiles');
    }

  /**
   * Load the profiles via AJAX
   *
   * @return json
   */
   public function loadProfilesViaAjax(){
	$profiles = Profile::all();
	$profilesArray = array();
	foreach($profiles as $profile){
		$profilesArray[] = array(
			'name' => $profile->name,
			'externalid' => $profile->externalid,
			'firstname' => $profile->first_name,
			'lastname' => $profile->last_name,
			'email' => $profile->email,
			'gender' => $profile->gender,
			'ip_address' => $profile->ip_address,
			'company' => $profile->company->name,
			'city' => $profile->city,
			'title' => $profile->title,
			'website' => $profile->website
		);
	}
	return json_encode($profilesArray);
  }

}
