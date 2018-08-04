<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Customer;

Route::get('/', function () {
    //return view('welcome');

    if (($handle = fopen ( public_path () . 'data/customers.csv', 'r' )) !== FALSE) {
		while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
			$customer_data = new Customer();
			$customer_data->id = $data [0];
			$customer_data->first_name = $data[1];
			$customer_data->last_name = $data[2];
			$customer_data->email = $data[3];
			$customer_data->gender = $data[4];
			$customer_data->ip_address = $data[5];
			$customer_data->company = $data[6];
			$customer_data->city = $data[7];
			$customer_data->title = $data[8];
			$customer_data->website = $data[9];
			$customer_data->save();
		}
		fclose ( $handle );
	}
	
	$finalData = $customer_data::all ();
	
	return view ( 'welcome' )->withData($finalData);
});
