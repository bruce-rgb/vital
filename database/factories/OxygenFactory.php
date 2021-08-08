<?php

namespace Database\Factories;

use App\Models\Oxygen;
use Illuminate\Database\Eloquent\Factories\Factory;

class OxygenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Oxygen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_patitient' => '',
            'oxygen' => '',
            'time' => '',
        ];
    }
}
