<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuestionType;
use App\Models\Test;
use App\Models\studentAnswer;
use Illuminate\Support\Facades\Auth;
use App\Models\studentTestAttenmp;

class TestController extends Controller
{
    public function index()
    {
        $test = Test::paginate(20);
        $test->setPath(asset('/test'));
        return view('admin/test')->with('all', $test);
    }
    public function add()
    {
        return view('admin/testAdd');
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string'],
            'course' => ['required', 'string'],
            'status' => ['required'],
            'start_date' => ['required', 'string'],
            'end_date' => ['required', 'string'],
            'duration' => ['required', 'string'],
        ]);
        $image = '';
        if(isset($request->image)){
            $destinationPath1 = public_path('file');
            $image = $request->image->getClientOriginalName();
            $image = str_replace(' ', '_',$image);
            $image = pathinfo($image, PATHINFO_FILENAME).time() . '.'. $request->image->extension();
        }
        Test::create([
            'name' => $request->name,
            'course_id' =>  $request->course,
            'batch_id' =>  $request->batch,
            'subject_id' => $request->subject,
            'duration' => $request->duration,
            'description' => $request->description,
            'image' => $image,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        if(isset($request->image)){
            $request->image->move($destinationPath1,$image);
        }
        return redirect('test');
    }
    public function edit($id)
    {
        $test = Test::where('id', $id)->first();
        return view('admin/testEdit')->with('data', $test);
    }
    public function editSave($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string'],
            'course' => ['required', 'string'],
            'status' => ['required'],
            'start_date' => ['required', 'string'],
            'end_date' => ['required', 'string'],
            'duration' => ['required', 'string'],
        ]);
        $image = '';
        if(isset($request->image)){
            $destinationPath1 = public_path('file');
            $image = $request->image->getClientOriginalName();
            $image = str_replace(' ', '_',$image);
            $image = pathinfo($image, PATHINFO_FILENAME).time() . '.'. $request->image->extension();
        }
        Test::where('id', $id)->update([
            'name' => $request->name,
            'course_id' =>  $request->course,
            'batch_id' =>  $request->batch,
            'subject_id' => $request->subject,
            'duration' => $request->duration,
            'description' => $request->description,
            'image' => $image,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        if(isset($request->image)){
            $request->image->move($destinationPath1,$image);
        }
        return redirect('test');
    }
    public function addQuestion($id)
    {
        $test = Test::where('id', $id)->first();
        return view('admin/addQuestion')->with('data', $test);
    }
    public function saveQuestion($id, Request $request)
    {
        $request->validate([
            'test' => ['required', 'string', 'max:255'],
            'question_type' => ['required', 'string'],
            'question' => ['required', 'string'],
            'option_one' => ['required', 'string'],
            'option_two' => ['required', 'string'],
            'option_three' => ['required', 'string'],
            'option_four' => ['required', 'string'],
            'ans' => ['required', 'string'],
            'marks' => ['required'],
            'duration' => ['required', 'string'],
        ]);
        Question::where('id', $id)->create([
            'test_id' => $request->test,
            'question_type' =>  $request->question_type,
            'question' => $request->question,
            'option_one' => $request->option_one,
            'option_two' => $request->option_two,
            'option_three' => $request->option_three,
            'option_four' => $request->option_four,
            'answer' => $request->ans,
            'marks' => $request->marks,
            'duration' => $request->duration,
            'status' => '1',
        ]);
        return redirect('test/question/list/'.$id);   
    }    
    public function questionList($id)
    {
        $question = Question::where('test_id', $id)->paginate(20);
        $question->setPath(asset('/test/question/list/'.$id));
        return view('admin/questionList')->with('datas',['all' => $question, 'test' => $id]);
    }
    public function questionEdit($test_id, $id)
    {
        $test = Test::where('id', $test_id)->first();
        $question = Question::where('id', $id)->first();
        return view('admin/questionEdit')->with('data', ['questions' => $question, 'tests' => $test]);
    }
    public function questionEditSave($test_id, $id,  Request $request)
    {
        $request->validate([
            'test' => ['required', 'string', 'max:255'],
            'question_type' => ['required', 'string'],
            'question' => ['required', 'string'],
            'option_one' => ['required', 'string'],
            'option_two' => ['required', 'string'],
            'option_three' => ['required', 'string'],
            'option_four' => ['required', 'string'],
            'marks' => ['required'],
            'ans' => ['required', 'string'],
            'duration' => ['required', 'string'],
        ]);
        Question::where('id', $id)->Update([
            'test_id' => $request->test_id,
            'question_type' =>  $request->question_type,
            'question' => $request->question,
            'option_one' => $request->option_one,
            'option_two' => $request->option_two,
            'option_three' => $request->option_three,
            'option_four' => $request->option_four,
            'marks' => $request->marks,
            'answer' => $request->ans,
            'duration' => $request->duration,
            'status' => '1',
        ]);
        return redirect('test/question/list/'.$test_id);   
    }
    public function view($id, $question_id = 0)
    {
        $user = Auth::user();
        $question = Question::where('test_id', $id);
        $questionCollection = studentAnswer::where('student_id', $user->id)->count('question_id');
        $question = Question::where('test_id', $id);
        $count = $question->count();
        if($questionCollection == 0) {
            $attemp = studentTestAttenmp::where('test_id', $id)->where('student_id', $user->id)->first();
            if(!isset($attemp->id)) {
                studentTestAttenmp::create([
                    "test_id" => $id,
                    "student_id" => $user->id,
                    "status" => 1,
                ]);
            } 
        }
        if($questionCollection == $count) {
            return view('admin/testSummary')->with('user', $user)->with('test', $id);
        }
        if($question_id != 0) {
            $question = $question->where('id', $question_id);
        }
        $question = $question->limit(2)->get();
        return view('admin/testView')->with('question', $question);
    }
    public function saveView($id, $question_id, Request $request)
    {
        $user = Auth::user();
        $ans = studentAnswer::where('student_id', $user->id)->where('question_id', $question_id)->first();
        $qu = Question::where('test_id', $id)->orderBy('id', 'DESC')->first();
        if($question_id == $qu->id) {
            studentTestAttenmp::where('test_id', $id)->Update([
                "status" => 2,
             ]);
        }
        if(!isset($ans->id)) {
            studentAnswer::create([
                "student_id" => $user->id,
                "question_id" => $question_id,
                "answer" => isset($request->option) ? implode(',',$request->option) : 0,
            ]);
        }
        $questionCollection = studentAnswer::where('student_id', $user->id)->pluck('question_id');
        $question = Question::whereNotIn('id', $questionCollection)->where('test_id', $id);
        $question = $question->limit(2)->get();
        if(isset($question[0]->id)) {
            return redirect('test/view/'.$id.'/'.$question[0]->id);  
        }
         return view('admin/testSummary')->with('user', $user)->with('test', $id);
    }
}
