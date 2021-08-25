<?php

namespace Database\Factories;

use App\Models\Bimestre;
use App\Models\Course;
use App\Models\Point;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Activity;

class PointFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Point::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'punteo' => $this->faker->numberBetween(0, 100),
            'date' => $this->faker->date('Y-m-d', 'now'),
            'bimestre_id' => Bimestre::all()->random()->id,
            'activity_id' => Activity::all()->random()->id,
            
        ];
    }
}
