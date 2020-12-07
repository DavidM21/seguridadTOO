<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolTableSeeder extends Seeder
{
    static $roles = [
        'Super Administrador',
        'Administrador',
        'Usuario'
    ];

    public function run()
    {
        foreach(self::$roles as $rol){
            DB::table('roles')->insert([
                'name'=> $rol,
                'guard_name'=> 'web'
            ]);
        }
    }
}
