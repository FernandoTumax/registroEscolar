<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Bimestre;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(20),
            'student_id' => Student::all()->random()->id,
            'bimestre_id' => Bimestre::all()->random()->id,
            'activity_id' => Activity::all()->random()->id
        ];
    }
}
