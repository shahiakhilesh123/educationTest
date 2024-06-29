<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\File;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $user = User::where('role', 2)->paginate(20);
        $user->setPath(asset('/student'));
        return view('/admin/student', ["all"=>$user]);
    }
    public function add()
    {
        return view('admin/studentAdd');
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'aadhar_id' => 'required',
            'marksheet' => 'required',
        ]);
        $destinationPath = public_path('file');
        $aadhar_id = $request->aadhar_id->getClientOriginalName();
        $aadhar_id = str_replace(' ', '_',$aadhar_id);
        $aadhar_id = pathinfo($aadhar_id, PATHINFO_FILENAME).time() . '.'. $request->aadhar_id->extension();
        File::create(
                [
                    "user_id" => '1',
                    "file_name" => $aadhar_id,
                    "file_type" => $request->aadhar_id->getClientMimeType(),
                    "file_size" => $request->aadhar_id->getSize(),
                    "full_path" => public_path('file'),
                ]   
        );
        $request->aadhar_id->move($destinationPath,$aadhar_id);
        $marksheet = $request->marksheet->getClientOriginalName();
        $marksheet = str_replace(' ', '_',$marksheet);
        $marksheet = pathinfo($marksheet, PATHINFO_FILENAME).time() . '.'. $request->marksheet->extension();
        File::create(
                [
                    "user_id" => '1',
                    "file_name" => $marksheet,
                    "file_type" => $request->marksheet->getClientMimeType(),
                    "file_size" => $request->marksheet->getSize(),
                    "full_path" => public_path('file'),
                ]
        );
        $request->marksheet->move($destinationPath,$marksheet);
        User::create([
            'role' => '2',
            'name' =>  $request->name,
            'url_name' => $request->url_name,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'aadhar_id' => $aadhar_id,
            'marksheet' => $marksheet,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);
        return redirect('student');
    }
    public function edit($id)
    {
        $subject = User::where('id', $id)->first();
        return view('admin/studentEdit')->with('data', $subject);
    }
    public function saveEdit($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => 'required|string',
        ]);
        User::where('id', $id)->update([
            'role' => $request->role,
            'name' =>  $request->name,
            'url_name' => $request->url_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('student');        
    }
}
