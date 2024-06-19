<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Menu;

class RoleController extends Controller
{
    public function index(){
        $role = Role::paginate(20);
        $role->setPath(asset('/roles'));
        return view('/admin/role', ["roles"=>$role]);
    }
    public function add(){
        return view('/admin/addRole', ["menues"=>Menu::where('menu_id', 0)->get()->toArray()]);
    }
    public function save(Request $request){
        $request->validate([
            'role_name' => 'required|string',
        ]);
        Role::create([
            'role_name' => $request->role_name,
            'menu_ids' => implode(',', $request->menus),
            'permission_id' => implode(',', $request->permission),
            'status' => 1,
        ]);
        return redirect('roles');
    }
    public function edit($id) 
    {
        return view('/admin/editRole', ["menues"=>Menu::where('menu_id', 0)->get()->all(), "roles" => Role::where('id', $id)->get()->first()]);
    }
    public function editSave($id, Request $request)
    {
        $request->validate([
            'role_name' => 'required|string',
        ]);
        Role::where('id', $id)->update([
            'role_name' => $request->role_name,
            'menu_ids' => implode(',', $request->menus),
            'permission_id' => implode(',', $request->permission),
            'status' => 1,
        ]);
        return redirect('roles');
    }
}
