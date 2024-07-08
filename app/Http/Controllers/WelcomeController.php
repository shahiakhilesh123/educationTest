<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {   
        return view('welcome');
    }
    public function about()
    {
        return view('welcome');
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