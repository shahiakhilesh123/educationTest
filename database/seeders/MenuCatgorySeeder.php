<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuCatgorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const MENU_CATEGORY = 'menu_categories';

    public function run()
    {
        DB::table(self::MENU_CATEGORY)->insert([
            ["category" => 'Admin'],["category" => 'User']
        ]);
    }
}
