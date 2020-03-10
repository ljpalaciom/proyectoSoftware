<?php
use App\Training;
use Illuminate\Database\Seeder;


class TrainingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Training::class,8)->create();
    }
}
