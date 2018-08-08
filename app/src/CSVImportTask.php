<?php 
namespace sasky\catchTest\tasks;

use SilverStripe\Dev\BuildTask;
use Illuminate\Support\Collection;
use SilverStripe\ORM\Map;
use sasky\catchTest\app\Customer;

class CSVImportTask extends BuildTask
{
    private static $segment = 'CSVImportTask';

    protected $title = 'CSV Import Task';
    protected $description = 'Imports all the CSV Data';
   
    public function run($request)
    {
        $customersToImport = $this->convertCSVIntoArray();
        
        // Mapping the Customer Keys so they conform to SS DB conventions
        $customerDBMap = [
            'first_name' => 'FirstName',
            'last_name' => 'LastName',
            'email' => 'Email',
            'gender'=> 'Gender',
            'ip_address' => 'IPAddress',
            'company' => 'Company',
            'city' => 'City',
            'title' => 'Title',
            'website' => 'Website'
        ];

        foreach ($customersToImport as $customerToImport) {
            // if a customer is found with a matching email then assume this record
            // has already been created
            if (Customer::get()->filter('Email', $customerToImport['email'])->first()) {
                continue;
            }
            $customer = Customer::create();
            foreach ($customerToImport as $customerKey => $customerValue) {
                $customer->setField($customerDBMap[$customerKey], $customerValue);
            }
            $customer->write();
        }
    }
    
    /**
     * Converts the supplied CSV file into an array
     * @return array a list of customers
     */

    private function convertCSVIntoArray()
    {
        // I know there are functions for doing similar things in php like str_getcsv
        // But I just wanted to have a crack at doing it manually for fun.

        // note: using the Collection class from Laravel
        // takes a bit of getting used to, but I think it makes cleaner code
        // than the nested foreach loops you would usually see in php code like this
        // inspirited by https://adamwathan.me/refactoring-to-collections/

        $csvString = file_get_contents('/var/www/html/data/customers.csv');
        $collection = new Collection(explode("\n", $csvString));
    
        $headerTitles =  $collection->filter(function ($item, $key) {
            return $key === 0;
        })->map(function ($item) {
            return explode(',', $item);
        })->first();

        return $collection->values()->reject(function ($item, $key) {
            // reject the first row as it's the header row
            // also reject any item returns falsy
            return $key === 0 || !$item;
        })->map(function ($item) {
            $array = explode(',', $item);
            return $array;
        })->map(function ($item, $key) use ($headerTitles) {
            // build an associative array with the header titles as keys
            return array_combine($headerTitles, $item);
        })->map(function ($item, $key) {
            // remove the id column's as SS will set that when a record is created
            // as long as we keep the list in order the csv id's should match up to the DB record's that are about to be created
            unset($item['id']);
            return $item;
        })->toArray();
    }
}
