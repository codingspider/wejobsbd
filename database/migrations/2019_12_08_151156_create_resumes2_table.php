<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumes2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes2', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref_name2')->nullable();
            $table->string('ref_organization2')->nullable();
            $table->string('ref_designation2')->nullable();
            $table->string('ref_mobile2')->nullable();
            $table->string('ref_email2')->nullable();
            $table->string('re_address2')->nullable();
            $table->string('ref_relation2')->nullable();
            $table->string('education_level2')->nullable();
            $table->string('result2')->nullable();
            $table->string('exam_degree2')->nullable();
            $table->string('passing_year2')->nullable();
            $table->string('major_group2')->nullable();
            $table->string('duration2')->nullable();
            $table->string('education_board2')->nullable();
            $table->string('Institute2')->nullable();
            $table->string('achievement2')->nullable();

            $table->string('training_title2')->nullable();
            $table->string('training_country2')->nullable();
            $table->string('training_topics')->nullable();
            $table->string('training_year')->nullable();
            $table->string('training_institute2')->nullable();
            $table->string('training_duration2')->nullable();
            $table->string('training_location2')->nullable();

            $table->string('certicate1')->nullable();
            $table->string('certificate_location')->nullable();
            $table->string('certificate_location2')->nullable();
            $table->string('certificate2')->nullable();

            $table->string('com_name2')->nullable();
            $table->string('responsibilities2')->nullable();
            $table->string('com_business2')->nullable();
            $table->string('com_loaction2')->nullable();
            $table->string('designation2')->nullable();
            $table->string('emp_period2')->nullable();


            $table->string('com_name')->nullable();
            $table->string('responsibilities')->nullable();
            $table->string('com_business')->nullable();
            $table->string('com_loaction')->nullable();
            $table->string('designation')->nullable();
            $table->string('emp_period')->nullable();
            $table->string('pre_job_location')->nullable();
            $table->string('skill')->nullable();
            $table->string('skill2')->nullable();
            $table->string('how_did_you_learn')->nullable();
            $table->string('how_did_you_learn2')->nullable();

            $table->string('language')->nullable();
            $table->string('reading')->nullable();
            $table->string('writing')->nullable();
            $table->string('speaking')->nullable();

            $table->string('language2')->nullable();
            $table->string('reading2')->nullable();
            $table->string('writing2')->nullable();
            $table->string('speaking2')->nullable();
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
        Schema::dropIfExists('resumes2');
    }
}
