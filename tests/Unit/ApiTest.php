<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAllCustomersFromDatabase()
    {  
        $resp = $this->call('POST', '/api/customers');
        $this->assertEquals(200, $resp->status());
    }
}
