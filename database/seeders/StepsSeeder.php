<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory;

class StepsSeeder extends Seeder
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
                DB::table('steps')->insert([
                    'id_patient' => $i,
                    'steps' => $faker->numberBetween(0, 600),
                    'time' => $newDateTime,
                ]);
                $newDateTime = $currentDateTime->addMinutes(30);
            }
        }
    }
}
