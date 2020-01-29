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

    $personaldetails = DB::table('personal_details')->where('user_id', Auth::id())->first();
    $address = DB::table('address_details')->where('user_id', Auth::id())->orderBy('id', 'desc')->first();
    $career = DB::table('career_details')->where('user_id', Auth::id())->orderBy('id', 'desc')->first();
    $prefer_jobs = DB::table('prefer_job_details')->where('user_id', Auth::id())->orderBy('id', 'desc')->first();
    $career_summery = DB::table('other_details')->where('user_id', Auth::id())->orderBy('id', 'desc')->first();
    $education_level = DB::table('academic_details')->where('user_id', Auth::id())->get();
    $training_title = DB::table('training__details')->where('user_id', Auth::id())->get();
    $certificate = DB::table('professional_details')->where('user_id', Auth::id())->get();
    $employments = DB::table('employment_details')->where('user_id', Auth::id())->get();
    $others_employments = DB::table('resumes2')->where('user_id', Auth::id())->whereNotNull('batch')->get();
    $specials = DB::table('special_details')->where('user_id', Auth::id())->get();
    $languages = DB::table('language_details')->where('user_id', Auth::id())->get();
    $reference = DB::table('refernce_details')->where('user_id', Auth::id())->get();
    $images = DB::table('photograph')->where('user_id', Auth::id())->orderBy('id', 'desc')->first();
    $word_resume = DB::table('resumes')->whereNotNull('resume')->where('user_id', Auth::id())->orderBy('id', 'desc')->first();
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



