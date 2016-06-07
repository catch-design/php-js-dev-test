<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Catchmigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	Schema::create('profiles', function (Blueprint $table) {
        	$table->increments('id');
        	$table->unsignedMediumInteger('externalid');
		$table->string('first_name');
		$table->string('last_name');
		$table->string('email');
		$table->enum('gender', ['Male', 'Female', 'Other']);
		$table->string('ip_address');
		$table->integer('company_id')->unsigned()->nullable();
		$table->string('city');
		$table->string('title');
		$table->string('website');
		$table->timestamps();

		$table->foreign('company_id')->references('id')->on('profiles');
	});
	Schema::create('companies', function (Blueprint $table) {
        	$table->increments('id');
		$table->string('name');
		$table->timestamps();
	});
	//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
