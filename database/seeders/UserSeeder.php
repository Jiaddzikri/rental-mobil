<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("user_models")
          ->insert([
            "email" => "test@gmail.com",
            "username" => "usertest",
            "role" => "admin",
            "password" => password_hash("test", PASSWORD_BCRYPT)
          ]);
    }
}
