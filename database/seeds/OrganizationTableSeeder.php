<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationTableSeeder extends Seeder
{
    static $organizations = [
        'Nike',
        'Volkswagen',
        'Sony',
        'Corsair',
        'Asus'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$organizations as $organization){
            DB::table('organizations')->insert([
                'name'=> $organization,
                'user_id'=>3
            ]);
        }
    }
}
