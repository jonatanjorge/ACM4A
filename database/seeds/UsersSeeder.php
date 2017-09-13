<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 1; $i < 11; $i++){
            DB::table('users')->insert([
                "nombre" => $faker->firstName,
                "apellido" => $faker->lastName,
                "email" => $faker->email,
                "password" => bcrypt("1234"),
                "telefono" => $faker->phoneNumber
            ]);
        }
    }
}
