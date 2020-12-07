<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     static $numeros = [3,4,5,6];
     public function run()
    {
        //Super admin securiy.too@gmail.com
        DB::table('model_has_roles')->insert([
            'role_id'=> '1',
            'model_type'=> 'App\User',
            'model_id'=> '1'
        ]);

        //Administrador
        DB::table('model_has_roles')->insert([
            'role_id'=> '2',
            'model_type'=> 'App\User',
            'model_id'=> '2'
        ]); 

        foreach(self::$numeros as $numero){
            DB::table('model_has_roles')->insert([
                'role_id'=> 3,
                'model_type'=> 'App\User',
                'model_id'=> $numero
            ]);
        }

        //Usuario
        
    }
}
