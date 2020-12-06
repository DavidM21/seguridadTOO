<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasPermisionTableSeeder extends Seeder
{
    static $roleUnos = [
        1,2,3,4,5,6,7
    ];
    static $rolesDos = [
        1,3,4,5,6,7
    ];
    static $rolesTres = [
        3,4,5,6,7
    ];

    public function run()
    {
        foreach(self::$roleUnos as $roleUno){
            DB::table('role_has_permissions')->insert([
                'permission_id'=> $roleUno,
                'role_id'=> 1
            ]);
        }

        foreach(self::$rolesDos as $roleDo){
            DB::table('role_has_permissions')->insert([
                'permission_id'=> $roleDo,
                'role_id'=> 2
            ]);
        }

        foreach(self::$rolesTres as $rolesTre){
            DB::table('role_has_permissions')->insert([
                'permission_id'=> $rolesTre,
                'role_id'=> 3
            ]);
        }
    }
}
