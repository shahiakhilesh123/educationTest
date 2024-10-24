<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;


class WelcomeController extends Controller
{
    public function index()
    {   
        $setting = Setting::first();
        return view('welcome')->with('setting', $setting);
    }
    public function about()
    {
        $setting = Setting::first();
        return view('about')->with('setting', $setting);
    }
    public function courses()
    {
        return view('courses');
    }
    public function team()
    {
        return view('team');
    }
    public function testimonial()
    {
        return view('testimonial');
    }
    public function error()
    {
        return view('error');
    }
    public function welcome()
    {
        return view('wel');
    }
}