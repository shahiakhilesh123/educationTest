<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuestionType;
use App\Models\Test;

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
            'start_date' => ['required', 'string'],
            'end_date' => ['required', 'string'],
            'duration' => ['required', 'string'],
        ]);
        Test::create([
            'name' => $request->name,
            'course_id' =>  $request->course,
            'subject_id' => $request->subject,
            'duration' => $request->duration,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return redirect('test');
    }
    public function edit($id)
    {
        $test = Test::where('id', $id)->first();
        return view('admin/testEdit')->with('data', $test);
    }
    public function saveEdit($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string'],
            'course' => ['required', 'string'],
            'start_date' => ['required', 'string'],
            'end_date' => ['required', 'string'],
            'duration' => ['required', 'string'],
        ]);
        Test::where('id', $id)->create([
            'name' => $request->name,
            'course_id' =>  $request->course,
            'subject_id' => $request->subject,
            'duration' => $request->duration,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
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
            'duration' => $request->duration,
            'status' => '1',
        ]);
        return redirect('test/question/list/'.$id);   
    }    
    public function questionList($id)
    {
        $question = Question::paginate(20);
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
            'ans' => ['required', 'string'],
            'duration' => ['required', 'string'],
        ]);
        Question::where('id', $id)->create([
            'test_id' => $request->test_id,
            'question_type' =>  $request->question_type,
            'question' => $request->question,
            'option_one' => $request->option_one,
            'option_two' => $request->option_two,
            'option_three' => $request->option_three,
            'option_four' => $request->option_four,
            'answer' => $request->ans,
            'duration' => $request->duration,
            'status' => '1',
        ]);
        return redirect('test/question/list/'.$id);   
    }
    public function view($id)
    {
        $question = Question::where('test_id', $id)->first();
        //$question->setPath(asset('/test/view/'.$id));
        return view('admin/testView')->with('question', $question);
    }
}
