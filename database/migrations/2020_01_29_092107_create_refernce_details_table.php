<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefernceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refernce_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
             $table->string('ref_name')->nullable();
            $table->string('ref_organization')->nullable();
            $table->string('ref_designation')->nullable();
            $table->string('ref_mobile')->nullable();
            $table->string('ref_email')->nullable();
            $table->string('re_address')->nullable();
            $table->string('ref_relation')->nullable();
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
        Schema::dropIfExists('refernce_details');
    }
}
