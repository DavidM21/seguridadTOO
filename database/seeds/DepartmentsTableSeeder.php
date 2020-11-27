<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    static $nikes = [
        'Producción',
        'Ventas',
        'Marketing',
        'Materia Prima'
    ];

    static $volkswagens = [
        'Producción',
        'Ventas',
        'Marketing',
        'Repuestos',
        'Fabricación'
    ];

    static $sonys = [
        'Marketing',
        'Repuestos',
        'Administración'
    ];

    static $corsairs = [
        'Marketing',
        'Repuestos',
        'Administración',
        'Fabricación'
    ];

    static $asuss = [
        'Marketing',
        'Repuestos',
        'Administración',
        'Fabricación'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$nikes as $nike){
            DB::table('departments')->insert([
                'name'=> $nike,
                'organization_id'=> 1
            ]);
        }

        foreach(self::$volkswagens as $volkswagen){
            DB::table('departments')->insert([
                'name'=> $volkswagen,
                'organization_id'=> 2
            ]);
        }

        foreach(self::$sonys as $sony){
            DB::table('departments')->insert([
                'name'=> $sony,
                'organization_id'=> 3
            ]);
        }

        foreach(self::$corsairs as $corsair){
            DB::table('departments')->insert([
                'name'=> $corsair,
                'organization_id'=> 4
            ]);
        }

        foreach(self::$asuss as $asus){
            DB::table('departments')->insert([
                'name'=> $asus,
                'organization_id'=> 5
            ]);
        }
    }
}
