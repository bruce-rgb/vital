<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory;

class OxygenSeeder extends Seeder
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
                DB::table('oxygens')->insert([
                    'id_patient' => $i,
                    'oxygen' => $faker->numberBetween(80, 100),
                    'time' => $newDateTime,
                ]);
                $newDateTime = $currentDateTime->addMinutes(30);
            }
        }
    }
}
