<?php
namespace sasky\catchTest\app;

use SilverStripe\ORM\DataObject;

class Customer extends DataObject
{
    private static $db = [
        'FirstName' => 'Varchar(255)',
        'LastName' => 'Varchar(255)',
        'Email' => 'Varchar(255)',
        'Gender' => 'Varchar(255)',
        'IPAddress' => 'Varchar(255)',
        'Company' => 'Varchar(255)',
        'City' => 'Varchar(255)',
        'Title' => 'Varchar(255)',
        'Website' => 'Text',
    ];

    private static $table_name = 'Customer';

    public static function get_all_records()
    {
        $records = [];
        foreach (self::get() as $customer) {
            $records[] = $customer->getRecord();
        }
        return $records;
    }

    public function getRecord()
    {
        $record = [];
        $record['id'] = $this->ID ? $this->ID : '';
        $record['first_name'] = $this->FirstName ? $this->FirstName : '';
        $record['last_name'] = $this->LastName ? $this->LastName : '';
        $record['email'] = $this->Email ? $this->Email : '';
        $record['gender'] = $this->Gender ? $this->Gender : '';
        $record['ip_address'] = $this->IPAddress ? $this->IPAddress : '';
        $record['company'] = $this->Company ? $this->Company : '';
        $record['city'] = $this->City ? $this->City : '';
        $record['title'] = $this->Title ? $this->Title : '';
        $record['website'] = $this->Website ? $this->Website : '';
        return $record;
    }
}
