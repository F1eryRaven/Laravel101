<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create();
        foreach (range(1, 100) as $index) {
            DB::table('user')->insert([
                'Name' =>$faker -> name,
                'Email'=> $faker ->email,
                'Password'=> $faker -> password(8.12)
                
        ]);
        }
    }
}
