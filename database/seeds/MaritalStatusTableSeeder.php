<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaritalStatusTableSeeder extends Seeder
{
    static $status = [
        'Solter@',
        'Casad@',
        'Divorciad@',
        'Viud@'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$status as $statu){
            DB::table('marital_statuses')->insert([
                'name'=> $statu,
            ]);
        }
    }
}
