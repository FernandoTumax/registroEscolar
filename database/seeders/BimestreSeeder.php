<?php

namespace Database\Seeders;

use App\Models\Bimestre;
use Illuminate\Database\Seeder;

class BimestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bimestre::create([
            'name' => 'Bimestre 1'
        ]);
        Bimestre::create([
            'name' => 'Bimestre 2'
        ]);
        Bimestre::create([
            'name' => 'Bimestre 3'
        ]);
        Bimestre::create([
            'name' => 'Bimestre 4'
        ]);
    }
}
