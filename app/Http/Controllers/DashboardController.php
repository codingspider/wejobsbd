<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobApplication;
use App\Payment;
use App\User;
use App\Data;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUsers;
use DB;
use Auth;

class DashboardController extends Controller
{
    public function dashboard(){

        $data = [
            'usersCount' => User::count(),
            'totalPayments' => Payment::success()->sum('amount'),
            'activeJobs' => Job::active()->count(),
            'totalJobs' => Job::count(),
            'employerCount' => User::employer()->count(),
            'agentCount' => User::agent()->count(),
            'totalApplicants' => JobApplication::count(),

        ];

        //return view('welcome');
        return view('admin.dashboard', $data);
    }

    public function import (){

        $personaldetails = DB::table('resumes')->where('user_id', Auth::id())->whereNotNull('first_name')->first();
        $address = DB::table('resumes')->where('user_id', Auth::id())->whereNotNull('present_add')->first();
        $career = DB::table('resumes')->where('user_id', Auth::id())->whereNotNull('present_sallary')->first();
        $prefer_jobs = DB::table('resumes')->where('user_id', Auth::id())->whereNotNull('job_location')->first();
        $career_summery = DB::table('resumes')->where('user_id', Auth::id())->whereNotNull('summery')->first();

        $education_level = DB::table('resumes')->where('user_id', Auth::id())->whereNotNull('education_level')->get();
        $training_title = DB::table('resumes2')->where('user_id', Auth::id())->whereNotNull('training_title')->get();
        $certificate = DB::table('resumes2')->where('user_id', Auth::id())->whereNotNull('certificate')->get();
        $employments = DB::table('resumes2')->where('user_id', Auth::id())->whereNotNull('com_name')->get();
        $others_employments = DB::table('resumes2')->where('user_id', Auth::id())->whereNotNull('batch')->get();
        $specials = DB::table('resumes2')->where('user_id', Auth::id())->whereNotNull('skill')->get();
        $languages = DB::table('resumes2')->where('user_id', Auth::id())->whereNotNull('language')->get();
        $reference = DB::table('resumes')->where('user_id', Auth::id())->whereNotNull('ref_name')->get();
        $gender = DB::table('genders')->get();

        return view('import_resume', compact('personaldetails', 'address', 'career', 'prefer_jobs','career_summery','education_level','training_title','certificate', 'employments', 'others_employments', 'specials', 'languages', 'reference', 'gender'));

    }

    public function import_resume (Request $request){

       $path = $request->file('file')->getRealPath();


        $data = Excel::load($path)->get();
        dd($data);

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = ['title' => $value->title, 'description' => $value->description];
            }

            if(!empty($arr)){
                Data::insert($arr);
            }
        }

    }

}



