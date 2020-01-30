<?php


namespace App\Http\Controllers;
error_reporting(0);

use Illuminate\Http\Request;
use DB;
use Auth;
use File;
class BdJobsController extends Controller
{

public function convertToText($filename)
{

    if (isset($filename) && !file_exists($filename)) {
        return "File Not exists";
    }

    $fileArray = pathinfo($filename);
    $file_ext  = $fileArray['extension'];
    if ($file_ext == "doc") {
        if ($file_ext == "doc") {
            return $this->read_doc($filename);
        }
    } else {
        return "Invalid File Type";
    }
}


public function read_doc($filename)
{
    $fileHandle = fopen($filename, "r");
    $line = @fread($fileHandle, filesize($filename));
    $lines = explode(chr(0x0D), $line);
    $outtext = "";
    foreach ($lines as $thisline) {
        $pos = strpos($thisline, chr(0x00));
        if (($pos !== FALSE) || (strlen($thisline) == 0)) {
        } else {
            $outtext .= $thisline . " ";
        }
    }
    return $outtext;
}

public function searchForText($text, $array)
{
    foreach ($array as $key => $val) {
        if ($val[0] === $text) {
            return $key;
        }
    }
    return null;
}

public function convert_doc(Request $request )
{
        $id = Auth::id();
        $image = DB::table('resumes')->where('user_id', '=', $id)->first();

        if(file_exists(public_path() . '/uploads/' . $image->resume)){
            unlink(public_path() . '/uploads/' . $image->resume);
        }

     if ($files = $request->file('resume')) {

            $image = $request->file('resume');

            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads');

            $filename = $image->move($destinationPath, $image_name);
            DB::table('resumes')->insert([
                'resume'=>$image_name,
                'user_id'=>Auth::id()
            ]);
        }

    $text = $this->convertToText($filename);

    $delete_word = '    ';
    $delete_npsb = '&nbsp;';

    $exclude_tag = "<html><title><body><table><tr><th><td>";

    $without_deleting_word = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", strip_tags($text, $exclude_tag));

    $style_removed = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i", '<$1$2>', $without_deleting_word);


    $fresh_data =  str_replace($delete_word, " ", $style_removed);
    $fresh_data =  str_replace($delete_npsb, " ", $fresh_data);

    file_put_contents($filename . '_converted.html', $fresh_data);
    $doc = new \DOMDocument();


    $doc->load($filename . '_converted.html');

    $tables = $doc->getElementsByTagName('tr');
    $mainArray = array();
    $subarray = array();
    $subarray2 = array();

    if (count($tables) > 0) //Only if table items are found
    {
        foreach ($tables as $key1 => $table) {

            foreach ($table->childNodes as $key => $pp) {

                if ($pp->childNodes && $pp->childNodes->length  == 1) {
                    $trimmed_data = trim($pp->nodeValue, " \t\n\r");
                    $subarray[] = $trimmed_data;
                }
            }
            $Emptysubarray = array_filter($subarray);
            if (!empty($Emptysubarray) && $key1 != 0) {
                if ($key1 == 2) {
                    $mainArray['name'] = trim($subarray[0], " \t\n\r");
                } elseif ($key1 == 4) {
                    $address_details = preg_split('/\r\n|\r|\n/', $subarray[0]);
                    foreach ($address_details as $address_part) {
                        $str = preg_replace("/[^A-Za-z]/", "", $address_part);
                        if (strlen($str)) {
                            $part = explode(":", $address_part);
                            $index_key = preg_replace('/\s+/', '', $part[0]);
                            $mainArray[$index_key] = trim($part[1], " \t\n\r");
                        }
                    }
                } elseif ($key1 == 7) {
                    $mainArray[$subarray[0]] = '';
                } elseif ($key1 == 8) {
                    $mainArray['Career Objective:'] = $subarray[0];
                } elseif ($key1 == 9) {
                    $mainArray[$subarray[0]] = '';
                } elseif ($key1 == 10) {
                    $mainArray['Career Summary:'] = $subarray[0];
                } elseif ($key1 == 11) {
                    $mainArray[$subarray[0]] = '';
                } elseif ($key1 == 12) {
                    $mainArray['Special Qualification:'] = $subarray[0];
                } else {
                    $subarray2[$key1] = $subarray;
                }
            }
            $subarray = array();
        }
    }

    $sections = array();

    $key =  $this->searchForText('Employment History:', $subarray2);
    if ($key) $sections[$key] = 'Employment History:';

    $key =  $this->searchForText('Academic Qualification:', $subarray2);
    if ($key) $sections[$key] = 'Academic Qualification:';

    $key =  $this->searchForText('Training Summary:', $subarray2);
    if ($key) $sections[$key] = 'Training Summary:';

    $key =  $this->searchForText('Professional Qualification:', $subarray2);
    if ($key) $sections[$key] = 'Professional Qualification:';

    $key =  $this->searchForText('Career and Application Information:', $subarray2);
    if ($key) $sections[$key] = 'Career and Application Information:';

    $key =  $this->searchForText('Specialization:', $subarray2);
    if ($key) $sections[$key] = 'Specialization:';

    $key =  $this->searchForText('Language Proficiency:', $subarray2);
    if ($key) $sections[$key] = 'Language Proficiency:';

    $key =  $this->searchForText('Personal Details :', $subarray2);
    if ($key) $sections[$key] = 'Personal Details :';

    $key =  $this->searchForText('Reference (s):', $subarray2);
    if ($key) $sections[$key] = 'Reference (s):';


    foreach ($sections as $key => $value) {
        $sections_key[] = $key;
    }

    $count = 0;
    $next = $sections_key[$count];

    $little_array = array();
    foreach ($subarray2 as $key => $value) {
        if ($next == $key) {
            $temp = $value[0];
            $little_array[$temp] = [];
            if (array_key_exists(++$count, $sections_key)) {
                $next = $sections_key[$count];
            } else {
                $next = 99999;
            }
        } elseif ($next > $key) {
            foreach ($value as $val) {
                if (
                    $val != ':'
                ) {
                    $little_array[$temp][] = $val;
                }
            }
        }
    }

    try {
        unlink($filename . '_converted.html');
    } catch (Exception $e) {
        print "whoops! something went wrong";
        //or even leaving it empty so nothing is displayed
    }

    $mainArray = array_merge($mainArray, $little_array);

    //  dd($mainArray);

    // academic details from bdjobs
    $existdata_academic = DB::table('academic_details')
            ->where('user_id', Auth::id())
            ->delete();

        $academic = $mainArray['Academic Qualification:'];
        $academic_arr = array();
        $count = 0;
         for($i = 7; $i < count($academic); $i++){

            if($i % 7 == 0){
                $temp = $count++;
            }
                $academic_arr[$temp][] = $academic[$i];

         }
        // dd($academic_arr);

         foreach ($academic_arr as $key => $acade) {
            DB::table('academic_details')->insert([
                'education_level' => $acade[0],
                'major_group' => $acade[1],
                'Institute' => $acade[2],
                'result' => $acade[3],
                'passing_year' => $acade[4],
                'duration' => $acade[5],
                'achievement' => $acade[6],
                'exam_degree' => '',
                'education_board' => '',
                'user_id' => Auth::id()
                ]);
         }
    // end academic details from bdjobs

    // Employment History details from bdjobs
    $existdata_academic = DB::table('employment_details')
            ->where('user_id', Auth::id())
            ->delete();
         $employment = $mainArray['Employment History:'];
        $employment_arr = array();
        $count = 0;
         for($i = 4; $i < count($employment); $i++){

            if($i % 4 == 0){
                $temp = $count++;
            }
                $employment_arr[$temp][] = $employment[$i];

         }
        //  dd($employment_arr);

         foreach ($employment_arr as $key => $employ) {
            DB::table('employment_details')->insert([
                'com_name' => $employ[0],
                'emp_period' => $employ[1],
                'responsibilities' => $employ[2],
                'com_loaction' => $employ[3],
                'com_business' => $employ[4],
                'designation' => $employ[5],
                'user_id' => Auth::id()
                ]);
         }
    // end academic details from bdjobs

    // Training Summary details from bdjobs
    $existdata_academic = DB::table('training__details')
            ->where('user_id', Auth::id())
            ->delete();

        $training = $mainArray['Training Summary:'];
        $training_arr = array();
        $count = 0;
         for($i = 7; $i < count($training); $i++){

            if($i % 7 == 0){
                $temp = $count++;
            }
                $training_arr[$temp][] = $training[$i];

         }
        // dd($training_arr);

         foreach ($training_arr as $key => $training) {
            DB::table('training__details')->insert([
                'training_title' => $training[0],
                'training_topics' => $training[1],
                'training_institute' => $training[2],
                'training_country' => $training[3],
                'training_location' => $training[4],
                'training_year' => $training[5],
                'training_duration' => $training[6],
                'user_id' => Auth::id()
                ]);
         }
    // end academic details from bdjobs

    // Professional details from bdjobs
    $existdata_academic = DB::table('professional_details')
            ->where('user_id', Auth::id())
            ->delete();

        $professional = $mainArray['Professional Qualification:'];
        $professional_arr = array();
        $count = 0;
         for($i = 5; $i < count($professional); $i++){

            if($i % 5 == 0){
                $temp = $count++;
            }
                $professional_arr[$temp][] = $professional[$i];

         }
        // dd($professional_arr);

         foreach ($professional_arr as $key => $profe) {
            DB::table('professional_details')->insert([
                'certicate' => $profe[0],
                'certificate_institiute' => $profe[2],
                'certificate_location' => $profe[1],
                'form_date' => $profe[4],
                'to_date' => $profe[5],
                'user_id' => Auth::id()
                ]);
         }
    // end academic details from bdjobs

    // Career and Application Information from bdjobs
    $existdata_academic = DB::table('career_details')
            ->where('user_id', Auth::id())
            ->delete();

        $preffer = $mainArray['Career and Application Information:'];

        $preffer_arr = array();
        $count = 0;
         for($i = 1; $i < count($preffer); $i+=2){
            $preffer_arr[] = $preffer[$i];
         }
        // dd($preffer_arr);
            DB::table('career_details')->insert([
                'job_nature' => $preffer_arr[0],
                'looking_for' => $preffer_arr[1],
                'present_sallary' => $preffer_arr[2],
                'exp_sallary' => $preffer_arr[3],
                'objective' => ' ',
                'user_id' => Auth::id()
                ]);
    // end academic details from bdjobs

            // Professional details from bdjobs
    $existdata_academic = DB::table('special_details')
            ->where('user_id', Auth::id())
            ->delete();

        $special = $mainArray['Specialization:'];
        $special_arr = array();
        $count = 0;
         for($i = 2; $i < count($special); $i++){

            if($i % 2 == 0){
                $temp = $count++;
            }
                $special_arr[$temp][] = $special[$i];
         }
        //  dd($special_arr);

         foreach ($special_arr as $key => $spec) {
            DB::table('special_details')->insert([
                'skill' => $spec[0],
                'description' => $spec[1],
                'how_did_you_learn' => '',
                'user_id' => Auth::id()
                ]);
         }
    // end academic details from bdjobs

            // Professional details from bdjobs
    $existdata_academic = DB::table('language_details')
            ->where('user_id', Auth::id())
            ->delete();

        $language = $mainArray['Language Proficiency:'];
        $language_arr = array();
        $count = 0;
         for($i = 4; $i < count($language); $i++){

            if($i % 4 == 0){
                $temp = $count++;
            }
                $language_arr[$temp][] = $language[$i];
         }
        //  dd($language_arr);

         foreach ($language_arr as $key => $lang) {
            DB::table('language_details')->insert([
                'language' => $lang[0],
                'reading' => $lang[1],
                'writing' => $lang[2],
                'speaking' => $lang[3],
                'user_id' => Auth::id()
                ]);
         }
    // end academic details from bdjobs
// dd($mainArray);
    // Career and Application Information from bdjobs
    $existdata_academic = DB::table('personal_details')
            ->where('user_id', Auth::id())
            ->delete();

        $personal = $mainArray['Personal Details :'];
        $personal_arr = array();
        $count = 0;
         for($i = 1; $i < count($personal); $i+=2){
            $personal_arr[] = $personal[$i];
         }
        //  dd($personal_arr);

         $personal_info =$mainArray[name];

            DB::table('personal_details')->insert([
                'first_name' => $mainArray[name],
                'father_name' => $personal_arr[0],
                'mother_name' => $personal_arr[1],
                'dob' => $personal_arr[2],
                'gender' => $personal_arr[3],
                'maritial' => $personal_arr[4],
                'nationality' => $personal_arr[5],
                'nid' => $personal_arr[6],
                'religion' => $personal_arr[7],
                'pa_number' => ' ',
                'pid' => ' ',
                'mobile1' => $mainArray[MobileNo1],
                'mobile2' => $mainArray[MobileNo2],
                'email' => $mainArray[e-mail],
                'email2' => ' ',
                'user_id' => Auth::id()
                ]);

            $existdata_academic = DB::table('address_details')
            ->where('user_id', Auth::id())
            ->delete();

            DB::table('address_details')->insert([
                'present_add' => $mainArray[Address],
                'permanent_add' => '',
                'user_id' => Auth::id()
                ]);

    // end academic details from bdjobs

    // Career and Application Information from bdjobs
    $existdata_academic = DB::table('refernce_details')
            ->where('user_id', Auth::id())
            ->delete();

        $reference = $mainArray['Reference (s):'];

        $reference_arr = array();
        $count = 0;
         for($i = 5; $i < count($reference); $i+=3){
            $reference_arr[] = $reference[$i];
         }
        // dd($reference_arr);

            DB::table('refernce_details')->insert([
                'ref_name' => $reference_arr[0],
                'ref_organization' => $reference_arr[1],
                'ref_designation' => $reference_arr[2],
                're_address' => $reference_arr[3],
                'ref_mobile' => $reference_arr[6],
                'ref_email' => '',
                'ref_relation' => $reference_arr[8],
                'user_id' => Auth::id()
                ]);
    // end academic details from bdjobs

            return redirect()->to('dashboard/view/resume');

}



}
