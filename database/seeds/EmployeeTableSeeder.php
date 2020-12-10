<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'first_name'=> 'Carlos',
            'last_name'=> 'Panameño',
            'dui'=> '05238508-8',
            'nit'=> '0614-010195-123-8',
            'isss'=> '05238508-8',
            'nup'=>'258946781543',
            'address'=> 'Urbanización La cima ',
            'job_position_id'=> 1,
            'marital_status_id'=> 1,
            'gender_id'=> 1,
            'city_id'=> 50
        ]);

        DB::table('employees')->insert([
            'first_name'=> 'Juan',
            'last_name'=> 'López',
            'dui'=> '08894571-2',
            'nit'=> '0357-081097-125-3',
            'isss'=> '08894571-2',
            'nup'=>'897189155311',
            'address'=> 'Residencial Lourdes',
            'job_position_id'=> 2,
            'marital_status_id'=> 2,
            'gender_id'=> 1,
            'city_id'=> 10
        ]);

        DB::table('employees')->insert([
            'first_name'=> 'Miguel',
            'last_name'=> 'Rodriguez',
            'dui'=> '03784712-3',
            'nit'=> '0512-091291-131-2',
            'isss'=> '03784712-3',
            'nup'=>'634514594214',
            'address'=> 'Villanueva',
            'job_position_id'=> 3,
            'marital_status_id'=> 1,
            'gender_id'=> 1,
            'city_id'=> 150
        ]);
    }
}
