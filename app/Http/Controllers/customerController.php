<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Customer;

class customerController extends Controller {    
	public function index()
	{
		return Customer::all();
	}

	public function show($id)
    {
        return Customer::find($id);
    }

    public function displayAllCustomer(){
    	return view('customer');	
    }

}
