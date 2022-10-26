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
            "email" => "arhamtrans04@gmail.com",
            "username" => "arhamtrans144454",
            "role" => "admin",
            "password" => password_hash("8908383jfdsklfdsnvss#$&@^#%#*@", PASSWORD_BCRYPT)
          ]);
    }
}
