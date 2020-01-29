<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('com_name')->nullable();
            $table->string('responsibilities')->nullable();
            $table->string('com_business')->nullable();
            $table->string('com_loaction')->nullable();
            $table->string('designation')->nullable();
            $table->string('emp_period')->nullable();
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
        Schema::dropIfExists('employment_details');
    }
}
