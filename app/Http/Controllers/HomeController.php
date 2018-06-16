<?php

namespace App\Http\Controllers;

use App\City;
use App\Company;
use App\Data;
use App\Title;
use Illuminate\Http\Request;
use Excel;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function import(){
        //$file = 'customers.csv';
        Excel::batch('data', function($rows, $file) {
            // for every file inside the batch
            $rows->each(function($row) {
                $city =0;
                $company=0;
                $title = 0;
                // Avoiding duplicate data in the data table
                if(!empty($row->city)) $city = $this->getCity($row->city);
                if(!empty($row->company)) $company = $this->getCompany($row->company);
                if(!empty($row->title)) $title = $this->getTitle($row->title);

                //email is mandatory and unique field
                if(!empty($row->email) && !empty($row->first_name)) {
                    //check duplicate record
                    if($this->avoidDuplicate($row->email))
                        // dumping data to table
                        $data = new Data();
                    $data->first_name = $row->first_name;
                    $data->last_name = $row->last_name;
                    $data->email = $row->email;
                    $data->gender = $row->gender;
                    $data->ip_address = $row->ip_address;
                    $data->title = $title;
                    $data->website = $row->website;
                    $data->city = $city;
                    $data->company = $company;
                    $data->save();
                }
            });

        });
    }

    private function getCity($data){
        $city = city::where(['city'=>$data])->first();
        if(!$city){
            $city = new city();
            $city->city = $data;
            $city = ($city->save()) ? $city : null;
        }
        return $city->id;
    }

    private function getCompany($data){
        $company = company::where(['company'=>$data])->first();
        if(!$company){
            $company=new company();
            $company->company = $data;
            $company=($company->save()) ? $company : null;
        }
        return $company->id;
    }

    private function getTitle($data){
        $title= title::where(['title'=>$data])->first();
        if(!$title){
            $title=new title();
            $title->title=$data;
            $title=($title->save()) ? $title:null;
        }
        return $title->id;
    }

    private function avoidDuplicate($data){
        $email = Data::where(['email'=>$data])->first();
        if(!$email){
            return true;
        }
        return false;
    }
}
