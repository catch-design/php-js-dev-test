<?php

use SilverStripe\Dev\FunctionalTest;

class CustomerJSONEndpointTest extends FunctionalTest
{
    protected static $fixture_file = 'CustomerJSONEndpointTest.yml';
    protected static $use_draft_site = true;
    public function test_customer_json_endpoint()
    {
        // GIVEN we have some customers in the DB
        // WHEN we ask for all the customers
        $response = $this->get('/home/getcustomers');
        // THEN we should get be json
        $jsonArray = json_decode($response->getBody(), 1);
        // THEN the json array should contain 3 records
        $this->assertEquals(3, count($jsonArray));
        // just check a couple of the fields
        $this->assertEquals('Nicholas', $jsonArray[2]['first_name']);
        $this->assertEquals('lwestc@1688.com', $jsonArray[1]['email']);
    }
}
