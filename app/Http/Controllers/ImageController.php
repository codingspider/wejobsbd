<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Auth;
use DB;

class ImageController extends Controller
{
    public function save(Request $request)
    {
        request()->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($files = $request->file('file')) {

            $image = $request->file('file');

            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads');

            $resize_image = Image::make($image->getRealPath());

            $resize_image->resize(150, 150, function($constraint){
             $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);

            $destinationPath = public_path('/images');

            $image->move($destinationPath, $image_name);

            DB::table('photograph')->insert([
                'photograph' =>$image_name,
                'user_id' => Auth::id()

            ]);

            return Response()->json([
                "success" => true,
                "image" => $image
            ]);

        }

        return Response()->json([
                "success" => false,
                "image" => ''
            ]);

    }

    public function upload_resumes(Request $request){

      $request->validate([
            'resume.*' => 'required|file|max:5000|mimes:pdf,docx,doc',
        ]);

        if ($files = $request->file('resume')) {

            $image = $request->file('resume');

            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads');

            $image->move($destinationPath, $image_name);

            DB::table('resumes')->insert([
                'resume' =>$image_name,
                'user_id' => Auth::id()

            ]);

            return back()->with('success', 'Resume uploaded succesfully ');
        }
    }
}
