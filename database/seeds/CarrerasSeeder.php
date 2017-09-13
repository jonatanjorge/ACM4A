<?php

use Illuminate\Database\Seeder;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert([
            "nombre" => "Analista de sistemas",
            "alias"  => "AC",
            "coordinador" => 1
        ]);

        DB::table('carreras')->insert([
            "nombre" => "Diseño Web",
            "alias"  => "DW",
            "coordinador" => 2
        ]);

        DB::table('carreras')->insert([
            "nombre" => "Diseño Multimedia",
            "alias"  => "DM",
            "coordinador" => 3
        ]);

        DB::table('carreras')->insert([
            "nombre" => "Diseño Gráfico",
            "alias"  => "DG",
            "coordinador" => 4
        ]);
    }
}
