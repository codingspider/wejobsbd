<?php


namespace App\Http\Controllers;
error_reporting(0);

use Illuminate\Http\Request;


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
    $filename = $request->resume;

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
                    $val != '' &&
                    $val != ':' &&
                    $val != 1 &&
                    $val != 2 &&
                    $val != 3 &&
                    $val != 4 &&
                    $val != 5 &&
                    $val != 6 &&
                    $val != '-'
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

    dd ($mainArray);

}


// $cv = convert_doc('$filename.doc');

//         // $academic = $cv['Academic Qualification:'];
//         if(empty($cv)){
//             echo "Please Don't edit your cv after downloading!";
//         }else{
//             print_r($cv);
//         }


}
