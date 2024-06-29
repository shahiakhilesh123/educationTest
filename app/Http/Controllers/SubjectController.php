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
        ]);
        Subject::create([
            'subject_name' => $request->subject_name,
            'status' => '1',
        ]);
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
        ]);
        Subject::where('id', $id)->update([
            'subject_name' => $request->subject_name,
        ]);
        return redirect('subject');        
    }
}
