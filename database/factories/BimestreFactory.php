<?php

namespace Database\Factories;

use App\Models\Bimestre;
use Illuminate\Database\Eloquent\Factories\Factory;

class BimestreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bimestre::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(10)
        ];
    }
}
