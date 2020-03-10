<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
     public function run()
       {
        $this->call(UsersTableSeeder::class);
        $this->call(AppointmentsTableSeeder::class);
        $this->call(RecordsTableSeeder::class);
        $this->call(ExercisesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(RecordsTableSeeder::class);
    }
}
