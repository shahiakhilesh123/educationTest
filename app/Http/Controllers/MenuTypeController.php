<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuType;

class MenuTypeController extends Controller
{
    public function index(){
        $menu_types = MenuType::all();
        return response()->json([
            'status' => 'success',
            'menu_type' => $menu_types,
        ]);
    }
    public function add(Request $request){
        $request->validate([
            'menu_type' => 'required|string',
        ]);
        $menu_type = MenuType::create([
            'type' => $request->menu_type,
        ]);
        return response()->json([
            'status' => 'success',
            'menu_type' => $menu_type,
        ]);
    }
    
    public function edit(Request $request){
        $request->validate([
            'id' => 'required|integer',
            'menu_type' => 'required|string',
        ]);
        $menu_type = MenuType::where('id', $request->id)->update([
            'type' => $request->menu_type,
        ]);
        return response()->json([
            'status' => 'success',
            'menu_type' => $menu_type,
        ]);
    }
}
