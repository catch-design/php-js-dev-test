<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->enum('gender', array('Male','Female','Other'))->default('Other');
            $table->string('ip_address')->nullable();
            $table->integer('title')->unsigned()->nullable()->index('titleImport');
            $table->integer('city')->unsigned()->nullable()->index('cityImport');
            $table->integer('company')->unsigned()->index('companyImport');
            $table->foreign('company')->references('id')->on('companies');
            $table->text('website')->nullable();;
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
        Schema::dropIfExists('data');
    }
}
