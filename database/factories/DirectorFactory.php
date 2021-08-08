<?php

namespace Database\Factories;

use App\Models\Director;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\MedicalUnit;

class DirectorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Director::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' =>User::factory()->director(),
            'id_unit' => MedicalUnit::factory(),
        ];
    }
}
