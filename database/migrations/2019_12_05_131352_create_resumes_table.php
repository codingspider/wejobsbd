<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable(); 
            $table->string('last_name')->nullable(); 
            $table->string('father_name')->nullable(); 
            $table->string('mother_name')->nullable(); 
            $table->string('dob')->nullable(); 
            $table->string('gender')->nullable(); 
            $table->string('nationality')->nullable(); 
            $table->integer('nid')->nullable(); 
            $table->string('maritial')->nullable(); 
            $table->string('religion')->nullable(); 
            $table->string('pa_number')->nullable(); 
            $table->string('pid')->nullable(); 
            $table->integer('mobile1')->nullable(); 
            $table->integer('mobile2')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('email2')->nullable(); 
            $table->string('present_add')->nullable(); 
            $table->string('permanent_add')->nullable(); 
            $table->string('present_sallary')->nullable(); 
            $table->string('exp_sallary')->nullable(); 
            $table->string('looking_for')->nullable(); 
            $table->string('job_nature')->nullable(); 
            $table->string('job_categories')->nullable(); 
            $table->string('job_location')->nullable(); 
            $table->string('summery')->nullable(); 
            $table->string('qualification')->nullable(); 
            $table->string('education_level')->nullable(); 
            $table->string('result')->nullable(); 
            $table->string('exam_degree')->nullable(); 
            $table->string('passing_year')->nullable(); 
            $table->string('major_group')->nullable(); 
            $table->string('duration')->nullable(); 
            $table->string('education_board')->nullable(); 
            $table->string('Institute')->nullable(); 
            $table->string('achievement')->nullable(); 


            $table->string('ref_name')->nullable(); 
            $table->string('ref_organization')->nullable(); 
            $table->string('ref_designation')->nullable(); 
            $table->string('ref_mobile')->nullable(); 
            $table->string('ref_email')->nullable(); 
            $table->string('re_address')->nullable(); 
            $table->string('ref_relation')->nullable(); 


            

            $table->integer('user_id')->nullable(); 
   
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
        Schema::dropIfExists('resumes');
    }
}
