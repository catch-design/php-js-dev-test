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
}
