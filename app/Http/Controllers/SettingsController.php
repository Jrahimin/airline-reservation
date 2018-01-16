<?php

namespace App\Http\Controllers;

use App\Library\SettingsSingleton;
use App\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{

    public function GetSettings(){
        return view("settings",["settings"]);
    }


    public function SaveSettings(Request $request){
        $this->validate($request,[
            "company_name"=>"required",
            "location"=>"required",
            "telephone"=>"required",
        ]);

        $settingsChange =$request->except(['_token', 'logo']);
        foreach($settingsChange as $key=>$value){
            SettingsSingleton::set($key,$value);
        }

        if ($request->logo) {
            $file = $request->file('logo');
            $destinationPath = 'images/company_logo';
            $image = $file->move($destinationPath, "company_logo.jpg");
        }

        /*if ($file) {

            $image = Image::make($file)->stream();
            Storage::disk('images')->put("logo" . '.png', $image);
        }*/

        return redirect()->route('change_settings');

    }

}
