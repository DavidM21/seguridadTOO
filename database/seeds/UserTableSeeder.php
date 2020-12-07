<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username'=> 'admin',
            'first_name'=> 'Administrador',
            'last_name'=> 'a',
            'email'=> 'conermendez95@gmail.com',
        ]);
    }
}
