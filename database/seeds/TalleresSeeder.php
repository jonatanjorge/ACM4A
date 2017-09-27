<?php

use Illuminate\Database\Seeder;

class TalleresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('talleres')->insert([
            "nombre" => "Python para principiantes",
            "profesor_id"  => 2,
            "horario" => "11-13",
            "fecha_inicio" => "07-05",
            "cantidad_horas" => 12
        ]);
    }
}
