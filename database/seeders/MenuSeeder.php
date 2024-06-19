<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const MENU = 'menus';
    public function run()
    {
        DB::table(self::MENU)->insert([
            [
                "menu_name" => 'Dashboard',
                "menu_id" => "0",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/dashboard",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'Menu',
                "menu_id" => "0",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/menu",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'Menu List',
                "menu_id" => "2",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/menu",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'Menu Add',
                "menu_id" => "2",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/addmenu",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'Manage Pages',
                "menu_id" => "0",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/pages",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'Pages & Folder',
                "menu_id" => "5",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/pages",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'Category',
                "menu_id" => "0",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/categories",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'Category List',
                "menu_id" => "7",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/categories",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'Add Category',
                "menu_id" => "7",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/categories/add",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'File',
                "menu_id" => "0",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/files",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'Post',
                "menu_id" => "0",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/posts",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'Post List',
                "menu_id" => "11",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/posts",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'Post Add',
                "menu_id" => "11",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/posts/add",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'Home Page Settings',
                "menu_id" => "0",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/setting",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'State',
                "menu_id" => "0",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/state",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'State List',
                "menu_id" => "15",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/state",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'State Add',
                "menu_id" => "15",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/state/add",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'District',
                "menu_id" => "0",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/district",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'District List',
                "menu_id" => "18",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/district",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'District Add',
                "menu_id" => "18",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/district/add",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'Pages',
                "menu_id" => "0",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/page",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'Page List',
                "menu_id" => "21",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/page",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'Pages Add',
                "menu_id" => "21",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "/page/add",
                "menu_class" => "fas fa-tachometer-alt"
            ],
            [
                "menu_name" => 'Page Blog Sequence',
                "menu_id" => "21",
                "type_id" => "3",
                "category_id" => "1",
                "status" => "1",
                "menu_link" => "page/sequence",
                "menu_class" => "fas fa-tachometer-alt"
            ]
        ]);
    }
}
