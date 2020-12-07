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
        $this->call(UserTableSeeder::class);
        $this->call(OrganizationTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(SecctionsTableSeeder::class);
        $this->call(AskTableSeeder::class);
        $this->call(RolTableSeeder::class);
        $this->call(PermisionsTableSeeder::class);
        $this->call(RoleHasPermisionTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
    }
}
