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
        ]);
        $pdf = '';
        if(isset($request->pdf)){
            $destinationPath1 = public_path('file');
            $pdf = $request->pdf->getClientOriginalName();
            $pdf = str_replace(' ', '_',$pdf);
            $pdf = pathinfo($pdf, PATHINFO_FILENAME).time() . '.'. $request->pdf->extension();
        }
        $image = '';
        if(isset($request->image)){
            $destinationPath1 = public_path('file');
            $image = $request->image->getClientOriginalName();
            $image = str_replace(' ', '_',$image);
            $image = pathinfo($image, PATHINFO_FILENAME).time() . '.'. $request->image->extension();
        }
        Course::create([
            'course_name' => $request->course_name,
            'brief' =>  $request->about_course,
            'description' => $request->course_mantra,
            'course_index_pdf' => $pdf,
            'image' => $image,
            'status' => '1',
        ]);
        if(isset($request->image)){
            $request->image->move($destinationPath1,$image);
        }
        if(isset($request->pdf)){
            $request->pdf->move($destinationPath1,$pdf);
        }
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
            'cu_amount' => ['required', 'string'],
            'amount' => ['required', 'string'],
        ]);
        $courses = Course::where('id', $id)->first();
        $pdf = $courses->course_index_pdf;
        if(isset($request->pdf)){
            $destinationPath1 = public_path('file');
            $pdf = $request->pdf->getClientOriginalName();
            $pdf = str_replace(' ', '_',$pdf);
            $pdf = pathinfo($pdf, PATHINFO_FILENAME).time() . '.'. $request->pdf->extension();
        }
        $image = $courses->image;
        if(isset($request->image)){
            $destinationPath1 = public_path('file');
            $image = $request->image->getClientOriginalName();
            $image = str_replace(' ', '_',$image);
            $image = pathinfo($image, PATHINFO_FILENAME).time() . '.'. $request->image->extension();
        }
        Course::where('id', $id)->update([
            'course_name' => $request->course_name,
            'brief' =>  $request->about_course,
            'description' => $request->course_mantra,
            'previous_cost' => $request->amount,
            'current_cost' => $request->cu_amount,
            'course_index_pdf' => $pdf,
            'image' => $image,
            'status' => '1',
        ]);
        if(isset($request->image)){
            $request->image->move($destinationPath1,$image);
        }
        if(isset($request->pdf)){
            $request->pdf->move($destinationPath1,$pdf);
        }
        return redirect('course');        
    }
}
