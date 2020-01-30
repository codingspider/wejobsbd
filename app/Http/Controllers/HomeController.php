<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use App\Mail\ContactUs;
use App\Mail\ContactUsSendToSender;
use App\Post;
use App\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use PDF;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categories = Category::orderBy('category_name', 'asc')->get();
        $premium_jobs = Job::active()->premium()->orderBy('id', 'desc')->with('employer')->get();
        $regular_jobs = Job::active()->orderBy('id', 'desc')->with('employer')->take(15)->get();
        $blog_posts = Post::whereType('post')->with('author')->orderBy('id', 'desc')->take(3)->get();
        $packages = Pricing::all();
        $image = DB::table('sliders')->orderBy('id','desc')->first();
        return view('home', compact('image','categories', 'premium_jobs','regular_jobs','packages', 'blog_posts'));
    }

    public function newRegister(){
        $title = __('app.register');
        return view('new_register', compact('title'));
    }

    public function pricing(){
        $title = __('app.pricing');
        $packages = Pricing::all();
        return view('pricing', compact('title', 'packages'));
    }

    public function contactUs(){
        $title = trans('app.contact_us');
        return view('contact_us', compact('title'));
    }

    public function contactUsPost(Request $request){
        $rules = [
            'name'  => 'required',
            'email'  => 'required|email',
            'subject'  => 'required',
        ];

        $this->validate($request, $rules);

        try{
            Mail::send(new ContactUs($request));
            Mail::send(new ContactUsSendToSender($request));
        }catch (\Exception $exception){
            return redirect()->back()->with('error', '<h4>'.trans('app.smtp_error_message').'</h4>'. $exception->getMessage());
        }

        return redirect()->back()->with('success', trans('app.message_has_been_sent'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *
     * Clear all cache
     */
    public function clearCache(){
        Artisan::call('debugbar:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        if (function_exists('exec')){
            exec('rm ' . storage_path('logs/*'));
        }
        return redirect(route('home'));
    }


//gender category realated function
    public function add_gender(){
         $data= DB::table('genders')->orderBy('id', 'asc')->get();
        return view('add_gender', compact('data'));
    }
    public function edit_gender($id){
         $data= DB::table('genders')->where('id', $id)->first();
        return view('edit_gender', compact('data'));
    }
    public function delete_gender ($id){
         $data= DB::table('genders')->where('id', $id)->delete();

        return back()->with('success', 'Gender Category Deleted. ');
    }

    public function add_gender_submit(Request $request){
        DB::table('genders')->insert([
            'name' => $request->gender,
        ]);
        return back()->with('success', 'Gender Category Added. ');
    }

    public function edit_gender_submit(Request $request){
        DB::table('genders')->update([
            'name' => $request->gender,
        ]);


        return redirect::to('/add/gender')->with('success', 'Gender Category Updated. ');
    }

    //end gneder function

    //Marital category realated function
    public function add_marital(){

         $data= DB::table('maritals')->orderBy('id', 'asc')->get();
        return view('add_maritals', compact('data'));
    }
    public function edit_marital ($id){
         $data= DB::table('maritals')->where('id', $id)->first();
        return view('edit_maritals', compact('data'));
    }
    public function delete_marital ($id){
         $data= DB::table('maritals')->where('id', $id)->delete();

        return back()->with('success', 'Maritals Category Deleted. ');
    }

    public function add_marital_submit(Request $request){
        DB::table('maritals')->insert([
            'name' => $request->marital,
        ]);


        return back()->with('success', 'Gender Category Added. ');
    }


    public function education_category_submit (Request $request){
        DB::table('education_levels_cats')->insert([
            'education_level' => $request->education_level,
            'result' => $request->result,
            'board' => $request->board,
        ]);


        return back()->with('success', 'Education Related Category Added. ');
    }

    public function edit_marital_submit (Request $request){
        $id = $request->id;
        DB::table('maritals')->where('id', $id)->update([
            'name' => $request->marital,
        ]);
        return redirect::to('add/marital/status')->with('success', 'Marital Category Updated. ');
    }

    public function education_category(){
        $data= DB::table('education_levels_cats')->get();

        return view('education_category', compact('data'));
    }

    //end gneder function

    public function generateDocx()
    {
        set_time_limit(180);
        $id = Auth::id();

        $personaldetails = DB::table('personal_details')->where('user_id', Auth::id())->first();
        $address = DB::table('address_details')->where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        $career = DB::table('career_details')->where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        $prefer_jobs = DB::table('prefer_job_details')->where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        $career_summery = DB::table('other_details')->where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        $education_level = DB::table('academic_details')->where('user_id', Auth::id())->get();
        $training_title = DB::table('training__details')->where('user_id', Auth::id())->get();
        $certificate = DB::table('professional_details')->where('user_id', Auth::id())->get();
        $employments = DB::table('resumes2')->where('user_id', Auth::id())->whereNotNull('com_name')->get();
        $others_employments = DB::table('resumes2')->where('user_id', Auth::id())->whereNotNull('batch')->get();
        $specials = DB::table('special_details')->where('user_id', Auth::id())->get();
        $languages = DB::table('language_details')->where('user_id', Auth::id())->get();
        $reference = DB::table('refernce_details')->where('user_id', Auth::id())->get();
        $images = DB::table('photograph')->where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        $word_resume = DB::table('resumes')->where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        $gender = DB::table('genders')->get();


        $pdf = PDF::loadView('export', compact('personaldetails', 'address', 'career', 'prefer_jobs', 'career_summery', 'education_level', 'training_title', 'certificate', 'employments', 'others_employments', 'specials', 'languages', 'reference', 'gender', 'images'))
        ->setPaper('a4', 'portrait');
       return $pdf->stream('document.pdf');
        // return view('export', compact('personaldetails', 'address', 'career', 'prefer_jobs', 'career_summery', 'education_level', 'training_title', 'certificate', 'employments', 'others_employments', 'specials', 'languages', 'reference', 'gender', 'images'));
    }

    public function home_image(){
        return view('home_image');
    }

    public function home_image_submit (Request $request){


        $data_img =   DB::table('sliders')->orderBy('id','desc')->first();
        $filename =  public_path("/uploads/".$data_img->image);

            if(file_exists($filename))
            {
                unlink($filename);
            }

        $request->validate([
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        ]);

        if ($files = $request->file('image')) {

            $image = $request->file('image');

            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads');

            $image->move($destinationPath, $image_name);

            DB::table('sliders')->insert([
                'image' =>$image_name,

            ]);
            return back()->with('success', 'Image uploaded succesfully ');
        }
    }

}
