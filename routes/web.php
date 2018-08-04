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
    return view('welcome');
});

Route::get('customerimport', function () {
    //return view('welcome');

    if (($handle = fopen ( public_path () . '/data/customers.csv', 'r' )) !== FALSE) {

    	$row = 1;
		while ( ($data = fgetcsv ( $handle, 0, ',' )) !== FALSE ) {
			if($row == 1){ $row++; continue; }

			$customer_data = new Customer();

			$customer_data->id = $data[0];
			$customer_data->first_name = isset($data[1]) ? $data[1] : null;
			$customer_data->last_name = isset($data[2]) ? $data[2] : null;
			$customer_data->email = isset($data[3]) ? $data[3] : null;
			$customer_data->gender = isset($data[4]) ? $data[4] : null;
			$customer_data->ip_address = isset($data[5]) ? $data[5] : null;
			$customer_data->company = isset($data[6]) ? $data[6] : null;
			$customer_data->city = isset($data[7]) ? $data[7] : null;
			$customer_data->title = isset($data[8]) ? $data[8] : null;
			$customer_data->website = isset($data[9]) ? $data[9] : null;

			$customer_data->save();
		}

		fclose ( $handle );
	}
	
	$finalData = $customer_data::all ();
	//var_dump($finalData);
	
	return view ( 'welcome' )->withData($finalData);
});

Route::resource('customers', 'customerController');
Route::get('customerlist', 'customerController@displayAllCustomer');

// Route::post('customer/import', 'customerController@import');
