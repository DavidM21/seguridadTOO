<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BansTableSeeder extends Seeder
{
    static $usuarios = [1,2,3,4,5,6];
    public function run()
    {
        foreach(self::$usuarios as $usuario){
            DB::table('bans')->insert([
                'blocked'=> false,
                'active'=> true,
                'attempts'=> 0,
                'user_id' => $usuario
            ]);
        }
    }
}
