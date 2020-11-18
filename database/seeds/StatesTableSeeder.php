<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StatesTableSeeder extends Seeder
{
    static $departamentos = [
        'Ahuachapán',
        'Sonsonate',
        'Santa Ana',
        'La Libertad',
        'Chalatenango',
        'San Salvador',
        'Cuscatlán',
        'La Paz',
        'Cabañas',
        'San Vicente',
        'Usulután', 
        'San Miguel',
        'Morazán',
        'La Unión'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$departamentos as $departamento){
            DB::table('states')->insert([
                'name'=> $departamento,
            ]);
        }
    }

    /**Crear varios for each con distintas cadenas para guardar datos */
}
