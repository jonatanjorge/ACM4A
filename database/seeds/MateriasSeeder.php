<?php

use Illuminate\Database\Seeder;

class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('materias')->insert([
            "nombre" => "Integración de programación",
        ]);

        DB::table('materias')->insert([
            "nombre" => "Integración de programación",
        ]);

        DB::table('materias')->insert([
            "nombre" => "Diseño interactivo",
        ]);

        DB::table('materias')->insert([
            "nombre" => "Diseño interactivo",
        ]);
    }
}
