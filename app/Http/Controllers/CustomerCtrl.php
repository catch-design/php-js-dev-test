<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerCtrl extends Controller
{

    public function index(){
        $customers = Customer::all();
        return  response()->json($customers);
    }

    public function getCustomer($id){
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    public function createCustomer(Request $request){
        $customer = Customer::create($request->all());
        return response()->json($customer);
    }

    public function deleteCustomer($id){
        $customer = Customer::find($id);
        $customer->delete();

        return response()->json('deleted');
    }

    public function updateCustomer(Request $request, $id){
        $customer = Customer::find($id);
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        /* etc */
        $customer->save();

        return response()->json($customer);
    }

}
