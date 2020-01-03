<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditResumeController extends Controller
{
   public function edit_resume (){
    return view ('edit-resume');
   }
}
