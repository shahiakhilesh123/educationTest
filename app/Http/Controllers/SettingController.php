<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin/home')->with('setting', Setting::where('id', '1')->get()->first());
    }
    public function saveSetting(Request $request)
    {
        $setting = Setting::where('id', '1')->get()->first();
        $logo = $setting->logo;
        if(isset($request->logo)){
            $destinationPath1 = public_path('file');
            $logo = $request->logo->getClientOriginalName();
            $logo = str_replace(' ', '_',$logo);
            $logo = pathinfo($logo, PATHINFO_FILENAME).time() . '.'. $request->logo->extension();
        }
        Setting::where('id', 1)->update([
            'site_name' => $request->site_name,
            'meta_tag' => $request->meta_tag,
            'meta_description' => $request->meta_description,
            'keyword' => $request->keyword,
            'youtube' => $request->youtube,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'logo' => $logo,
        ]);
        if(isset($request->logo)){
            $request->logo->move($destinationPath1,$logo);
        }
        return redirect('setting');
    }
    public function saveSettingCategory(Request $request)
    {
        Setting::where('id', 1)->update([
            'course_category' => implode(',', $request->subject_cat),
        ]);
        return redirect('setting');
    }
    public function saveSettingCourse(Request $request)
    {
        Setting::where('id', 1)->update([
            'course' => implode(',', $request->course),
        ]);
        return redirect('setting');
    }
    
    // 'course_category' => implode(',',$request->category),
    //         'course' => implode(',',$request->course),
}
