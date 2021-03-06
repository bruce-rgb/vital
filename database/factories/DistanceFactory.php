<?php

namespace Database\Factories;

use App\Models\Distance;
use Illuminate\Database\Eloquent\Factories\Factory;

class DistanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Distance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_patitient' => '',
            'distance' => '',
            'time' => '',
        ];
    }
}
