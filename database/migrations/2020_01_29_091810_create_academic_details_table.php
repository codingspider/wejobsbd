<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('education_level')->nullable();
            $table->string('result')->nullable();
            $table->string('exam_degree')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('major_group')->nullable();
            $table->string('duration')->nullable();
            $table->string('education_board')->nullable();
            $table->string('Institute')->nullable();
            $table->string('achievement')->nullable();
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
        Schema::dropIfExists('academic_details');
    }
}
