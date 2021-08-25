<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Bimestre;
use App\Models\Course;
use App\Models\Point;
use App\Models\Student;
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
        // \App\Models\User::factory(10)->create();
        $this->call(StudentSeeder::class);
        $this->call(BimestreSeeder::class);
        Activity::factory(10)->create();
        Course::factory(10)->create();
        Point::factory(10)->create();
    }
}
