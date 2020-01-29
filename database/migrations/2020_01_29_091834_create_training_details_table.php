<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training__details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('training_title')->nullable();
            $table->string('training_country')->nullable();
            $table->string('training_topics')->nullable();
            $table->string('training_year')->nullable();
            $table->string('training_institute')->nullable();
            $table->string('training_duration')->nullable();
            $table->string('training_location')->nullable();
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
        Schema::dropIfExists('training__details');
    }
}
