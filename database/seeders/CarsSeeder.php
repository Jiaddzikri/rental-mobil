<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("id_ID");

        for($i = 1; $i <= 10; $i++) {
            DB::table("cars_model")
                ->insert([
                    "merk" => $faker->name,
                    "type" => $faker->name,
                    "transmisi" => "Automatic",
                    "deskripsi" => $faker->text,
                    "gambar" => $faker->text
                ]);
        }
    }
}
