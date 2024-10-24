<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subject = Subject::paginate(20);
        $subject->setPath(asset('/batch'));
        return view('admin/subject')->with('all', $subject);
    }
    public function add()
    {
        return view('admin/subjectAdd');
    }
    public function save(Request $request)
    {
        $request->validate([
            'subject_name' => ['required', 'string', 'max:255'],
            'subject_image' => ['required'],
        ]);
        $destinationPath1 = public_path('file');
        $subject_image = $request->subject_image->getClientOriginalName();
        $subject_image = str_replace(' ', '_',$subject_image);
        $subject_image = pathinfo($subject_image, PATHINFO_FILENAME).time() . '.'. $request->subject_image->extension();
        Subject::create([
            'subject_name' => $request->subject_name,
            'subject_image' => $subject_image,
            'status' => '1',
        ]);
        $request->subject_image->move($destinationPath1,$subject_image);
        return redirect('subject');
    }
    public function edit($id)
    {
        $subject = Subject::where('id', $id)->first();
        return view('admin/subjectEdit')->with('data', $subject);
    }
    public function saveEdit($id, Request $request)
    {
        $request->validate([
            'subject_name' => ['required', 'string', 'max:255'],
            'subject_image' => ['required'],
        ]);
        $subject_image = '';
        if(isset($request->pdf1)){
            $destinationPath1 = public_path('file');
            $subject_image = $request->subject_image->getClientOriginalName();
            $subject_image = str_replace(' ', '_',$subject_image);
            $subject_image = pathinfo($subject_image, PATHINFO_FILENAME).time() . '.'. $request->subject_image->extension();
        }
        Subject::where('id', $id)->update([
            'subject_name' => $request->subject_name,
            'subject_image' => $subject_image,
        ]);
        if(isset($request->pdf1)){
            $request->subject_image->move($destinationPath1,$subject_image);
        }
        return redirect('subject');        
    }
}
