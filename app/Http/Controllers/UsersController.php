<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index() 
    {
        $user = User::whereNot('id', 6)->paginate(20);
        $user->setPath(asset('/users'));
        return view('/admin/users', ["users"=>$user]);
    }
    public function add()
    {
        $role = Role::whereNot('id', 3)->get()->all();
        return view('/admin/addUser', ['roles'=>$role]);
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => 'required|string',
        ]);
        
        User::create([
            'role' => $request->role,
            'name' =>  $request->name,
            'url_name' => $request->url_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('users');
    }
    public function edit($id)
    {
        $user = User::where('id', $id)->get()->first();
        $role = Role::whereNot('id', 3)->get()->all();
        return view('/admin/editUser', ['roles'=>$role,'user'=>$user]);
    }
    public function editSave($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'role' => ['required']
        ]);
        User::where('id', $id)->update([
            'role' => $request->role,
            'name' =>  $request->name,
            'url_name' => $request->url_name,
            'description' => $request->description
        ]);
        return redirect('users');   
    }
}
