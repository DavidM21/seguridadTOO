<?php

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
        $this->call(GendersTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(MaritalStatusTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
    }
}
