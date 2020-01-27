<?php

namespace App\Http\Controllers;

use App\Option;
use App\Pricing;
use Illuminate\Http\Request;
use DB;
use Image;
class SettingsController extends Controller
{
    public function GeneralSettings(){
        $title = trans('app.general_settings');
        return view('admin.settings-general', compact('title'));
    }

    public function GatewaySettings(){
        $title = trans('app.gateway_settings');
        return view('admin.settings-gateways', compact('title'));
    }

    public function PricingSettings(){
        $title = trans('app.pricing_settings');
        return view('admin.settings-pricing', compact('title'));
    }
    public function PricingSave(Request $request){
        foreach ($request->package as $id => $input){
            $package = Pricing::firstOrCreate(['id' => $id]);
            $package->update($input);
        }

        return back()->with('success', __('app.operation_success'));
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request) {
        $inputs = array_except($request->input(), ['_token']);

        foreach($inputs as $key => $value) {
            $option = Option::firstOrCreate(['option_key' => $key]);
            $option -> option_value = $value;
            $option->save();
        }
        //check is request comes via ajax?
        if ($request->ajax()){
            return ['success'=>1, 'msg'=>trans('app.settings_saved_msg')];
        }
        return redirect()->back()->with('success', trans('app.settings_saved_msg'));
    }

    public function create_logo(){
        return view('logo_change');
    }

    public function logo_update(Request $request){

        $this->validate($request, [
              'logo'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
             ]);

             $image = $request->file('logo');

             $image_name = time() . '.' . $image->getClientOriginalExtension();

             $destinationPath = public_path('/uploads');

             $resize_image = Image::make($image->getRealPath());

             $resize_image->resize(150, 150, function($constraint){
              $constraint->aspectRatio();
             })->save($destinationPath . '/' . $image_name);

             $image->move($destinationPath, $image_name);

    	DB::table('logo')->insert([
    		'name' =>$image_name,

    	]);

            return back()->with('success', 'Logo uploaded succesfully ');
        }
}
