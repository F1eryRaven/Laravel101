<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder 
{
    /**
 * Run the database seeds.
 *
 * @return void
 */
    public function run(){

        $faker = faker::create();
        foreach (range(1,100) as $index){
        DB::table('employees')->insert([
            'FirstName' => $faker->Firstname,
            'LastName' => $faker->Lastname,
            'Email'=> $faker ->email,
            'PhoneNumber'=> $faker->phoneNumber,
            'CompanyID'=>$faker->randomDigitNotNull(1,100)
           
        ]);
        }
    }
}