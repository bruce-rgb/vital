<?php

namespace Database\Factories;

use App\Models\Calories;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CaloriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Calories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $id = 1;

        return [
            'id_patient' => $id++,
            'calories' => $this->faker->numberBetween(0, 100),
            'time' => '',
        ];

    }
}
