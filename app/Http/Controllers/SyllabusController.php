<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Syllabus;

class SyllabusController extends Controller
{
    public function index()
    {
        $syllabus = Syllabus::paginate(20);
        $syllabus->setPath(asset('/syllabus'));
        return view('/admin/syllabus', ["all"=>$syllabus]);
    }
    public function add()
    {
        return view('admin/syllabusAdd');
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'course' => ['required'],
            'subject' => ['required'],
            'batch' => ['required'],
            'chapter' => ['required'],
            'test' => ['required'],
        ]);
        Syllabus::create([
            'name' => $request->name,
            'course_id' =>  $request->course,
            'subject_id' => $request->subject,
            'batch_id' => $request->batch,
            'chapter_ids' => implode(',',$request->chapter),
            'test_ids' => implode(',',$request->test),
            'status' => '1',
        ]);
        return redirect('syllabus');
    }
    public function edit($id)
    {
        $subject = Syllabus::where('id', $id)->first();
        return view('admin/syllabusEdit')->with('data', $subject);
    }
    public function view($id)
    {
        $syllabus = Syllabus::where('id', $id)->first();
        return view('admin/syllabusView')->with('data', $syllabus);
    }
    public function saveEdit($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => 'required|string',
        ]);
        Syllabus::where('id', $id)->update([
            'role' => $request->role,
            'name' =>  $request->name,
            'url_name' => $request->url_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('syllabus');        
    }
}
