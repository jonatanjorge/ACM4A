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
        DB::table('users')->insert([
            "nombre" => "Jonatan",
            "apellido" => "Jorge",
            "email" => "jonatan.jorge@davinci.edu.ar",
            "password" => bcrypt("1234"),
            "telefono" => null,
            "sexo_id" => 1,
        ]);


        $faker = Faker\Factory::create();

        for($i = 1; $i < 11; $i++){
            DB::table('users')->insert([
                "nombre" => $faker->firstName,
                "apellido" => $faker->lastName,
                "email" => $faker->email,
                "password" => bcrypt("1234"),
                "telefono" => $faker->phoneNumber,
                "sexo_id" => 1,
            ]);
        }
    }
}
