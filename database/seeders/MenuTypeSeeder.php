<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MenuTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const MENU_TYPE = "menu_types";
    public function run()
    {
        DB::table(self::MENU_TYPE)->insert([
            ["type" => 'Header'],["type" => 'Footer'],["type" => 'SideBar']
        ]);
    }
}
