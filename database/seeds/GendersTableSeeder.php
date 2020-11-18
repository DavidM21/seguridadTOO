<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; /* Cambiar nombre de base de datos de ser necesario*/

class GendersTableSeeder extends Seeder
{
    static $generos =[
        'Masculino',
        'Femenino'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$generos as $genero){
            DB::table('genders')->insert([
                'name'=> $genero,

            ]);
        }
    }
}
