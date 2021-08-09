<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory;

class HeartRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentDateTime = Carbon::now();
        $faker = Factory::create();
        for ($i = 1; $i < 29; $i++) {
            $newDateTime = $currentDateTime;

            for ($j = 1; $j < 31; $j++) {
                DB::table('heart_rates')->insert([
                    'id_patient' => $i,
                    'heart_rate' => $faker->numberBetween(150, 200),
                    'time' => $newDateTime,
                ]);
                $newDateTime = $currentDateTime->addMinutes(30);
            }
        }
    }
}
