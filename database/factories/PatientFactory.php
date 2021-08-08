<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Doctor;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' => User::factory()->patient(),
            'id_doctor' => Doctor::factory(),
            'birthday' => $this->faker->date('Y_m_d','1999-06-09'), //Doctor::all()->random()->id_unit,
        ];
    }
}
