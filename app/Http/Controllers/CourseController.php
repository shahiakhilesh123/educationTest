<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(20);
        $courses->setPath(asset('/course'));
        return view('admin/course')->with('all', $courses);
    }
    public function add()
    {
        return view('admin/courseAdd');
    }
    public function save(Request $request)
    {
        $request->validate([
            'course_name' => ['required', 'string', 'max:255'],
            'about_course' => ['required', 'string'],
            'course_mantra' => ['required', 'string'],
            'course_mission' => ['required', 'string'],
            'course_criteria' => ['required', 'string'],
        ]);
        Course::create([
            'course_name' => $request->course_name,
            'about_course' =>  $request->about_course,
            'course_mantra' => $request->course_mantra,
            'course_mission' => $request->course_mission,
            'course_criteria' => $request->course_criteria,
            'status' => '1',
        ]);
        return redirect('course');
    }
    public function edit($id)
    {
        $courses = Course::where('id', $id)->first();
        return view('admin/courseEdit')->with('data', $courses);
    }
    public function saveEdit($id, Request $request)
    {
        $request->validate([
            'course_name' => ['required', 'string', 'max:255'],
            'about_course' => ['required', 'string'],
            'course_mantra' => ['required', 'string'],
            'course_mission' => ['required', 'string'],
            'course_criteria' => ['required', 'string'],
        ]);
        Course::where('id', $id)->update([
            'course_name' => $request->course_name,
            'about_course' =>  $request->about_course,
            'course_mantra' => $request->course_mantra,
            'course_mission' => $request->course_mission,
            'course_criteria' => $request->course_criteria,
            'status' => '1',
        ]);
        return redirect('course');        
    }
}
