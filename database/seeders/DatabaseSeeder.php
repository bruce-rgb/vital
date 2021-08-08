<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(DirectorSeeder::class); //10 Directors
        //$this->call(DoctorSeeder::class); created by patients down
        $this->call(PatientSeeder::class); // 30 patients with his respective 30 doctors


        $this->call(UserSeeder::class);

    }
}
