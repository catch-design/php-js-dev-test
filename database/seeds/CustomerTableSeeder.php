<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //see from the csv
        $csvFile = new \Keboola\Csv\CsvFile(__DIR__ . '/../../data/customers.csv');
        foreach($csvFile as $index => $row) {

            if($index == 0){
                continue;
            }

            Customer::create([
                //omit id as increments
                'id' => $row[0],
                'first_name' => $row[1],
                'last_name' => $row[2],
                'email' => $row[3],
                'gender'=> $row[4],
                'ip_address' => $row[5],
                'company' => $row[6],
                'city' => $row[7],
                'title' => $row[8],
                'website' => $row[9]
            ]);
            
        }
    }
}
