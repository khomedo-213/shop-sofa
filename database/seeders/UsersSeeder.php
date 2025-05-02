<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users') -> insert([
           [
            "name" => "user1",
            "email" => "user1@gmail.com",
            "password" => Hash::make("123"),
           ],
           [
            "name" => "user2",
            "email" => "user2@gmail.com",
            "password" => Hash::make("231"),
           ],
           [
            "name" => "user3",
            "email" => "user3@gmail.com",
            "password" => Hash::make("312"),
           ],
        ]);
    }
}
