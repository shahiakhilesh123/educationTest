<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use App\Models\State;
use App\Models\Course;
use App\Models\Batch;
use App\Models\Test;
use App\Models\CourseUserMap;
use App\Models\studyMaterialModel;
use Illuminate\Support\Facades\Hash;
class StoryController extends Controller
{
    public function showStory($cat_name, $name)
    {
    }
    public function courseDetail($id)
    {
        $course = Course::where('id', $id)->first();
        return view('courseDetail')->with('course', $course);
    }
    public function courseBatchList($course)
    {
        $course = str_replace('_', ' ', $course);
        $course = Course::where('course_name', $course)->first();
        $batches = [];
        if(isset($course->id)) {
            $batches = Batch::where('course_id', $course->id)->where('batch_mode', '1')->get();
        }
        return view('batchList')->with('data', ['batches' => $batches, 'course' => $course, 'type' => 1]);
    }
    public function courseBatchListOffline($course) 
    {
        $course = str_replace('_', ' ', $course);
        $course = Course::where('course_name', $course)->first();
        $batches = [];
        if(isset($course->id)) {
            $batches = Batch::where('course_id', $course->id)->where('batch_mode', '0')->get();
        }
        return view('batchList')->with('data', ['batches' => $batches, 'course' => isset($course->id) ? $course : [] , 'type' => 0]);
    }
    public function studyBatchList($course) 
    {
        $course = str_replace('_', ' ', $course);
        $course = Course::where('course_name', $course)->first();
        $study = [];
        if(isset($course->id)) {
            $study = studyMaterialModel::where('course_id', $course->id)->get();
        }
        return view('studylist')->with('data', ['studies' => $study, 'course' => isset($course->id) ? $course : [] , 'type' => 0]);
    }
    public function testList($mode) 
    {
        $course = str_replace('_', ' ', $mode);
        $course = Course::where('course_name', $course)->first();
        $test = Test::where('course_id', $course->id)->whereNotNull('batch_id')->get();
        return view('testList')->with('data', ['tests' =>  isset($course->id) ? $test : [], 'course' => isset($course->id) ? $course : [] , 'type' => 0]);
    }
    public function joinCourse($course_id, $batch_id)
    {
        return view('joinCourse')->with('data' ,['course_id' => $course_id, 'batch_id' => $batch_id]);
    }
    public function payAndRegister($course_id, $batch_id)
    {
        return view('pay');
    }
    public function createJoinCourse($course_id, $batch_id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'date_of_birth' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $destinationPath = public_path('file');
        $aadhar_id = $request->file_adhar->getClientOriginalName();
        $aadhar_id = str_replace(' ', '_',$aadhar_id);
        $aadhar_id = pathinfo($aadhar_id, PATHINFO_FILENAME).time() . '.'. $request->file_adhar->extension();
        $marksheet = $request->file_marks->getClientOriginalName();
        $marksheet = str_replace(' ', '_',$marksheet);
        $marksheet = pathinfo($marksheet, PATHINFO_FILENAME).time() . '.'. $request->file_marks->extension();
        $image = $request->file_image->getClientOriginalName();
        $image = str_replace(' ', '_',$image);
        $image = pathinfo($image, PATHINFO_FILENAME).time() . '.'. $request->file_image->extension();
        $user = User::create([
            'role' => '2',
            'name' =>  $request->name,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'aadhar_id' => $aadhar_id,
            'marksheet' => $marksheet,
            'image' => $image,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);
        CourseUserMap::create([
            'user_id' => $user->id,
            'course_id' =>  $course_id,
            'batch_id' => $batch_id,
            'status' => 1,
        ]);
        $request->file_marks->move($destinationPath,$marksheet);
        $request->file_adhar->move($destinationPath,$aadhar_id);
        $request->file_image->move($destinationPath,$image);
        return redirect('login');
    }
    public function batchList($course_id)
    {
        $course = Course::where('id', $course_id)->first();
        $batches = Batch::where('course_id', $course_id)->get();
        return view('batchList')->with('data', ['batches' => $batches, 'course' => $course]);
    }
    public function privacy()
    {
        return view('privacy');
    }
    public function disclaimer()
    {
        return view('disclaimer');
    }
    public function contact()
    {
        return view('contact');
    }
    public function about()
    {
        return view('about');
    }
}
