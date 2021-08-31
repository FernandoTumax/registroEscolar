<?php

namespace Database\Factories;


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
            'punteo_neto' => $this->faker->numberBetween(0, 100),
            'student_id' => Student::all()->random()->id,
        ];
    }
}
