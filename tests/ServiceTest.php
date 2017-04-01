<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class ServiceTest extends TestCase
{
    /**
     * @return void
     */
    public function testIndex()
    {
        $this->json('GET', '/customers')
            ->assertResponseOk();
    }

    /**
     * @return void
     */
    public function testCreate()
    {
        $this->json('POST', '/customer', ['first_name' => 'Sally'])
            ->seeJson([
                'first_name' => 'Sally',
            ]);
    }

    /**
     * @return void
     */
    public function testRead()
    {
        $this->json('GET', '/customer/1')
            ->assertResponseOk();
    }

    /**
     * @return void
     */
    public function testUpdate()
    {
        $this->json('PUT', '/customer/1', ['first_name' => 'Sally', 'last_name' => 'Smith'])
            ->seeJson([
                'first_name' => 'Sally',
            ]);
    }
}
