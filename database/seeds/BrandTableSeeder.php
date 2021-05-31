<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'name' => 'Quintiles'
            ],
            [
                'name' => 'India Capital'
            ],
            [
                'name' => 'Paper Linx'
            ],
            [
                'name' => 'InfraRed'
            ],
            [
                'name' => 'Erlang'
            ],
            [
                'name' => 'Sport England'
            ]
          
        ]);
    }
}
