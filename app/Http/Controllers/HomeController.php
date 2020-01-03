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
        return view('home', compact('categories', 'premium_jobs','regular_jobs','packages', 'blog_posts'));
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
        $phpWord = new \PhpOffice\PhpWord\PhpWord();


        $section = $phpWord->addSection();


        $description = "Dummy Text";
        $section->addText($description);


        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path('helloWorld.docx'));
        } catch (Exception $e) {

        }
        return response()->download(storage_path('helloWorld.docx'));
    }

}
