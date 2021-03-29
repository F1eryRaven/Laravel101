<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker::create();
        $filepath= storage_path('images');
        foreach (range(1,100) as $index){
            DB::table('companies')->insert([
                'Name' => $faker->company,
                'Email'=>$faker ->companyEmail,
                'LogoLocation' =>'ProgrammerTest\public\storage\logos\test1.png',
                'Website'=> $faker->url
               
            ]);
        }
    }
}