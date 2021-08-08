<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Bruce',
            'last_name' => 'Robinson',
            'last_name2' => 'Santamaria',
            'email' => 'bruce123@live.com.mx',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone' => 2227499097,
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);
    }
}
