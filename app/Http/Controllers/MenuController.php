<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuType;
use App\Models\MenuCategory;

class MenuController extends Controller
{
    public function index(){
        $menus =  Menu::all();
        return response()->json([
            'status' => 'success',
            'menu' => $menus,
        ]);
    }

    public function MenuList(Request $request){
        $data = Menu::paginate(20);
        $data->setPath(asset('/menu'));
        return view('admin/menuList')->with('menus', $data);
    } 

    public function addMenu(Request $request){
        $menu = Menu::all();
        $type = MenuType::all();
        $category = MenuCategory::all();
        return view('admin/addmenu')->with('data', ['menus' => $menu , 'types' => $type, 'categories' => $category]);
    }
    public function menuAdd(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|integer',
            'category' => 'required|integer',
            'link' => 'required|string|max:255',
            'class'=>'required|string|max:255',
        ]);

        $menu = Menu::create([
            'menu_name' => $request->name,
            'menu_id' => $request->menu,
            'status' => '1',
            'type_id' => $request->type,
            'category_id' => $request->category,
            'menu_link' => $request->link,
            'menu_class' => $request->class,
        ]);
        return redirect('/menu');
    }
    public function editmenu(Request $request, $id){
        $menus = Menu::all();
        $type = MenuType::all();
        $category = MenuCategory::all();
        $menu = Menu::where('id', $id)->first();
        return view('admin/editmenu')->with('data', ['menus' => $menus , 'types' => $type, 'categories' => $category, 'menu' => $menu]);
    }
    public function menuedit(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|integer',
            'category' => 'required|integer',
            'link' => 'required|string|max:255',
            'class'=>'required|string|max:255',
        ]);

        $menu = Menu::where('id', $id)->update([
            'menu_name' => $request->name,
            'menu_id' => $request->menu,
            'status' => '1',
            'type_id' => $request->type,
            'category_id' => $request->category,
            'menu_link' => $request->link,
            'menu_class' => $request->class,
        ]);
        return redirect('/menu');
    }
    public function add(Request $request) {
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'type' => 'required|integer',
            'menu_link' => 'required|string|max:255',
            'menu_class'=>'required|string|max:255',
        ]);
        $menu = Menu::create([
            'menu_name' => $request->menu_name,
            'menu_id' => $request->menu_id,
            'status' => '1',
            'type' => $request->type,
            'menu_link' => $request->menu_link,
            'menu_class' => $request->menu_class,
        ]);
        return response()->json([
            'status' => 'success',
            'menu' => $menu,
        ]);
    }

    public function edit(Request $request) {
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'type' => 'required|integer',
            'menu_link' => 'required|string|max:255',
            'menu_class'=>'required|string|max:255',
        ]);
        $menu = Menu::where('id', $request->id)->update([
            'menu_name' => $request->menu_name,
            'menu_id' => $request->menu_id,
            'status' => '1',
            'type' => $request->type,
            'menu_link' => $request->menu_link,
            'menu_class' => $request->menu_class,
        ]);
        return response()->json([
            'status' => 'success',
            'menu' => $menu,
        ]);
    }
}
