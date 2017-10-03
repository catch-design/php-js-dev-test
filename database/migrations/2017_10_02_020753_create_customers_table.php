<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->index();
            $table->string('gender', 25);
            //account for ipv6 not sure if any are in dataset
            $table->string('ip_address', 50);
            $table->string('company');
            $table->string('city');
            $table->string('title');
            $table->text('website');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
