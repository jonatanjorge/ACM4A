<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersSeeder::class);
         $this->call(CarrerasSeeder::class);
         $this->call(ComisionesSeeder::class);
         $this->call(MateriasSeeder::class);
        $this->call(TalleresSeeder::class);
    }
}
