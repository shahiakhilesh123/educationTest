<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin/dashboard');
    }
    public function homePage()
    {
        $category = Category::get()->where('home_page_status', '1')->all();
        return view('welcome')->with('data', ['categories' => $category]);
    }
}
