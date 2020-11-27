<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecctionsTableSeeder extends Seeder
{
    static $produccions = [
        'Ensamblaje',
        'Control de cálidad'
    ];
    static $ventas = [
        'Ventas por mayor',
        'Ventas al menor'
    ];
    static $marketings = [
        'Área de diseño',
        'Redes Sociales',
        'Imprenta'
    ];
    static $administracions = [
        'Área de cobros',
        'Área de ventas',
        'Recursos humanos'
    ];
    static $fabricacions = [
        'Ensamblaje',
        'Control de cálidad'
    ];
    static $materiaPrimas = [
        'Bodega 1',
        'Bodega 2',
        'Bodega 3',
        'Bodega 4',
    ];
    static $repuestos = [
        'Área de escanéo',
        'Medidas',
        'Bodegas'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Se asigana el sector a la Producción
        foreach(self::$produccions as $produccion){
            DB::table('sections')->insert([
                'name'=> $produccion,
                'department_id'=> 1
            ]);
        }

        foreach(self::$produccions as $produccion){
            DB::table('sections')->insert([
                'name'=> $produccion,
                'department_id'=> 5
            ]);
        }

        //Se asigna el sector a las Ventas
        foreach(self::$ventas as $venta){
            DB::table('sections')->insert([
                'name'=> $venta,
                'department_id'=> 2
            ]);
        }

        foreach(self::$ventas as $venta){
            DB::table('sections')->insert([
                'name'=> $venta,
                'department_id'=> 6
            ]);
        }

        //Se asigna el sector al Marketing
        foreach(self::$marketings as $marketing){
            DB::table('sections')->insert([
                'name'=> $marketing,
                'department_id'=> 3
            ]);
        }

        foreach(self::$marketings as $marketing){
            DB::table('sections')->insert([
                'name'=> $marketing,
                'department_id'=> 7
            ]);
        }

        foreach(self::$marketings as $marketing){
            DB::table('sections')->insert([
                'name'=> $marketing,
                'department_id'=> 10
            ]);
        }

        foreach(self::$marketings as $marketing){
            DB::table('sections')->insert([
                'name'=> $marketing,
                'department_id'=> 13
            ]);
        }

        foreach(self::$marketings as $marketing){
            DB::table('sections')->insert([
                'name'=> $marketing,
                'department_id'=> 17
            ]);
        }

        //Se asigna el sector a MateriaPrima
        foreach(self::$materiaPrimas as $materiaPrima){
            DB::table('sections')->insert([
                'name'=> $materiaPrima,
                'department_id'=> 4
            ]);
        }

        //Se asigan el sector a Repuestos
        foreach(self::$repuestos as $repuesto){
            DB::table('sections')->insert([
                'name'=> $repuesto,
                'department_id'=> 8
            ]);
        }

        foreach(self::$repuestos as $repuesto){
            DB::table('sections')->insert([
                'name'=> $repuesto,
                'department_id'=> 11
            ]);
        }

        foreach(self::$repuestos as $repuesto){
            DB::table('sections')->insert([
                'name'=> $repuesto,
                'department_id'=> 14
            ]);
        }

        foreach(self::$repuestos as $repuesto){
            DB::table('sections')->insert([
                'name'=> $repuesto,
                'department_id'=> 18
            ]);
        }

        //Se asignan sectores a Fabricación
        foreach(self::$fabricacions as $fabricacion){
            DB::table('sections')->insert([
                'name'=> $fabricacion,
                'department_id'=> 9
            ]);
        }

        foreach(self::$fabricacions as $fabricacion){
            DB::table('sections')->insert([
                'name'=> $fabricacion,
                'department_id'=> 16
            ]);
        }

        foreach(self::$fabricacions as $fabricacion){
            DB::table('sections')->insert([
                'name'=> $fabricacion,
                'department_id'=> 20
            ]);
        }

        //Se asigna sector a Administración
        foreach(self::$administracions as $administracion){
            DB::table('sections')->insert([
                'name'=> $administracion,
                'department_id'=> 12
            ]);
        }
        
        foreach(self::$administracions as $administracion){
            DB::table('sections')->insert([
                'name'=> $administracion,
                'department_id'=> 15
            ]);
        }

        foreach(self::$administracions as $administracion){
            DB::table('sections')->insert([
                'name'=> $administracion,
                'department_id'=> 19
            ]);
        }
    }
}
