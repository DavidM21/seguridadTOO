<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'username'=> 'Super Administrador',
            'first_name'=> 'Super',
            'last_name'=> 'Administrador',
            'email'=> 'securiy.too@gmail.com',
            'cell_phone'=> '64789568',
            'passcode' => '1234',
            'password'=> Hash::make('admin')

        ]);

        DB::table('users')->insert([
            'username'=> 'Administrador',
            'first_name'=> 'Víctor',
            'last_name'=> 'Navarrete',
            'email'=> 'nm14001@ues.edu.sv',
            'cell_phone'=> '64789568',
            'passcode' => '1234',
            'password'=> Hash::make('nm14001')

        ]);

        DB::table('users')->insert([
            'username'=> 'Usuario',
            'first_name'=> 'Ricardo',
            'last_name'=> 'Sosa',
            'email'=> 'sh14020@ues.edu.sv',
            'cell_phone'=> '64789568',
            'passcode' => '1234',
            'password'=> Hash::make('sh14020')

        ]);

        DB::table('users')->insert([
            'username'=> 'Usuario',
            'first_name'=> 'Cristian',
            'last_name'=> 'Osegueda',
            'email'=> 'oa14007@ues.edu.sv',
            'cell_phone'=> '64789568',
            'passcode' => '1234',
            'password'=> Hash::make('oa14007')

        ]);
        DB::table('users')->insert([
            'username'=> 'Usuario',
            'first_name'=> 'Samael',
            'last_name'=> 'Agustín',
            'email'=> 'aa18087@ues.edu.sv',
            'cell_phone'=> '64789568',
            'passcode' => '1234',
            'password'=> Hash::make('aa18087')

        ]);

        DB::table('users')->insert([
            'username'=> 'Usuario',
            'first_name'=> 'David',
            'last_name'=> 'Mejía',
            'email'=> 'mr13023@ues.edu.sv',
            'cell_phone'=> '64789568',
            'passcode' => '1234',
            'password'=> Hash::make('mr13023')
        ]);

    }
}
