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
        Setting::where('id', 1)->update([
            'site_name' => $request->site_name,
            'meta_tag' => $request->meta_tag,
            'meta_description' => $request->meta_description,
            'keyword' => $request->keyword,
            'youtube' => $request->youtube,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'slider_header' => $request->slider_header,
            'slider_text' => $request->slider_text,
            'file' => $request->file,
            'category' => $request->category,
            'secound_row_first_file' => $request->secound_row_first_col_category,
            'secound_row_secound_col_category' => $request->secound_row_secound_col_category,
            'secound_row_third_file' => $request->secound_row_third_file,
            'third_row_category' => $request->third_row_category,
            'fourth_row_first_image' => $request->fourth_row_first_image,
            'fourth_row_first_cat' => $request->fourth_row_first_cat,
            'fourth_row_secound_cat' => $request->fourth_row_category,
            'fifth_row_first_cat' => $request->fifth_row_first_col_category,
            'fifth_row_second_cat' => $request->fifth_row_second_col_category,
        ]);
        return redirect('setting');
    }
}
