<?php

use Illuminate\Database\Seeder;
use App\Routine;

class RoutinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Routine::class,5)->create();
    }
}
