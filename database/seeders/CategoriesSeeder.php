<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
           [
            'name'=>'Gỗ',
            "parent_id"=>null
           ],
           [
            'name'=>'Da',
            "parent_id"=>2
           ],
           [
            'name'=>'Giường',
            "parent_id"=>3
           ],
           [
            'name'=>'Da Dụng',
            "parent_id"=>4
           ],
        ]);
    }
}
