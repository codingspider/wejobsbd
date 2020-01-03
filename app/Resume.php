<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $table = 'resumes';

    protected $fillable = ['first_name', '	last_name', 'father_name', 'mother_name','dob', 'gender', 'nationality', 'nid', 'maritial', 'religion', 'pa_number', 'pid', 'mobile1', 'mobile2', 'email', 'email2', 'education_level', 'result', 'exam_degree'];
}
