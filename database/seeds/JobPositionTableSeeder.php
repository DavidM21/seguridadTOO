<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobPositionTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('job_positions')->insert([
            'name'=> 'Mecánico',
            'salary'=> 350.00,
            'section_id'=> 1
        ]);

        DB::table('job_positions')->insert([
            'name'=> 'Ingeniero',
            'salary'=> 900.00,
            'section_id'=> 2
        ]);

        DB::table('job_positions')->insert([
            'name'=> 'Vendedor',
            'salary'=> 400.00,
            'section_id'=> 5
        ]);

        DB::table('job_positions')->insert([
            'name'=> 'Vendedor',
            'salary'=> 200.00,
            'section_id'=> 6
        ]);


    }
}
