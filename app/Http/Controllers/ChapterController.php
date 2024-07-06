<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;

class ChapterController extends Controller
{
    public function index()
    {
        $chapter = Chapter::paginate(20);
        $chapter->setPath(asset('/chapter'));
        return view('admin/chapter')->with('all', $chapter);
    }
    public function add()
    {
        return view('admin/chapterAdd');
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
        Chapter::create([
            'course_name' => $request->course_name,
            'about_course' =>  $request->about_course,
            'course_mantra' => $request->course_mantra,
            'course_mission' => $request->course_mission,
            'course_criteria' => $request->course_criteria,
            'status' => '1',
        ]);
        return redirect('chapter');
    }
    public function edit($id)
    {
        $chapter = Chapter::where('id', $id)->first();
        return view('admin/chapterEdit')->with('data', $chapter);
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
        Chapter::where('id', $id)->update([
            'course_name' => $request->course_name,
            'about_course' =>  $request->about_course,
            'course_mantra' => $request->course_mantra,
            'course_mission' => $request->course_mission,
            'course_criteria' => $request->course_criteria,
            'status' => '1',
        ]);
        return redirect('chapter');        
    }
}
