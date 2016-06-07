<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Company;
use App\Http\Controllers\Controller;
use DB;

class InstallController extends Controller
{

    /**
     * Import the CSV file
     *
     * @return Response
     */
    public function showInstall()
    {
	//set path - file needs to be at data/customers.csv
	$file_path = base_path() . '/data/customers.csv';
	//if file doesn't exist throw an error
	if(!file_exists($file_path)){
		throw new Exception('Error! CSV file is missing - should be in ' . $file_path);
	}
	$file = fopen($file_path,'r');
	//throw away first csv line
	fgetcsv($file);
	while($line = fgetcsv($file)){
		//CSV format: id	first_name	last_name	email	gender	ip_address	company	city	title	website
		//TODO: reference columns by constants e.g. $line[ImportTemplate::id] where id is defined as const id = 0;
		$profile = Profile::where('externalid', $line[0])->first();
		if(is_null($profile)){
			$profile = new Profile;
		}
		$profile->externalid = $line[0];
		$profile->first_name = $line[1];
		$profile->last_name = $line[2];
		$profile->email = $line[3];
		//save gender
		$gender = '';
		switch($line[4]){
			case 'Male':
				$gender = 'Male';
			break;
			case 'Female':
				$gender = 'Female';
			break;
			default:
				$gender = 'Other';
		}
		$profile->gender = $gender;
		$profile->ip_address = $line[5];
		
		//get/save company
		$companyName = $line[6];
		//Safe as Laravel uses PDO for non raw queries
		$company = Company::where('name', $companyName)->first();
		if(is_null($company)){
			$company = new Company;
			$company->name = $companyName;
			$company->save();
		} else {
			//echo gettype($company) . ' T ' . get_class($company) ; die;
			//$company = $company->company;
			//get_class($company) . ' T ' ; die;
		}
		$profile->company()->associate($company);
		$profile->city = $line[7];
		$profile->title = $line[8];
		$profile->website = $line[9];
		$profile->save();
	}
	//die;
        return view('install.showinstall');
    }


}
