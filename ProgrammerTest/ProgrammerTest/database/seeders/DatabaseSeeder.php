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
        /*Run these so the database has seeding functionality for employees and companies. */
        $this->call([ 
        CompanySeeder::class,
        EmployeeSeeder::class,]);

    }
}
