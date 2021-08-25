<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'name' => 'Josue Fernando Tumax',
            'carnet' => '2019013',
            'year' => '2021-08-02'
        ]);

        Student::factory(9)->create();
    }
}
