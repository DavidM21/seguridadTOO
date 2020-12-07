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
            'last_name'=> 'admin',
            'email'=> 'conermendez95@gmail.com',
            //'birthday'=> '1995/11/11',
            'cell_phone'=> '64789568',
            'passcode' => '1234',
            'password'=> 'admin'

        ]);
    }
}
