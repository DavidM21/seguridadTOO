<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class AskTableSeeder extends Seeder
{
    static $preguntas = [
        '¿Nombre de tu primera mascota?',
        '¿Cuál es el lugar de nacimiento tu abuela?',
        '¿Primera escuela donde estudiaste?',
        '¿Cantante o banda favorita en la secundaria?',
        '¿Cómo se llama la calle donde creciste?'

    ];

    public function run()
    {
        foreach(self::$preguntas as $pregunta){
            DB::table('asks')->insert([
                'content'=> $pregunta
            ]);
        }
    }
}
