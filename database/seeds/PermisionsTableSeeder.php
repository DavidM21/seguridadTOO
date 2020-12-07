<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisionsTableSeeder extends Seeder
{
    static $permisos = [
        'Gestor Usuarios',
        'Gestor Roles',
        'Gestor Organizaciones',
        'Gestor Departamentos',
        'Gestor Secciones',
        'Gestor Puestos',
        'Gestor Empleados'
    ];
    public function run()
    {
        foreach(self::$permisos as $permiso){
            DB::table('permissions')->insert([
                'name'=> $permiso,
                'guard_name'=> 'web'
            ]);
        }
    }
}
