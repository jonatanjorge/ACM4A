<?php

use Illuminate\Database\Seeder;

class ComisionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comisiones')->insert([
            "nombre" => "ACM4A",
            "turno" => "Mañana",
            "cuatrimestre"  => "4",
            "division" => "A",
            "carreras_id" => 1
        ]);

        DB::table('comisiones')->insert([
            "nombre" => "ACN4B",
            "turno" => "Noche",
            "cuatrimestre"  => "4",
            "division" => "B",
            "carreras_id" => 1
        ]);

        DB::table('comisiones')->insert([
            "nombre" => "DWM3A",
            "turno" => "Mañana",
            "cuatrimestre"  => "3",
            "division" => "A",
            "carreras_id" => 2
        ]);

        DB::table('comisiones')->insert([
            "nombre" => "DWN3B",
            "turno" => "Noche",
            "cuatrimestre"  => "3",
            "division" => "B",
            "carreras_id" => 2
        ]);
    }
}
