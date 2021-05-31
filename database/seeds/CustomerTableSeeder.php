<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'talha',
                'email' => 'talha@gmail.com',
                'password' => Crypt::encrypt("talha123"),
                'phone' => '0347123456',
                'address' => 'xyz street, karachi',
                'verification_code' => '5f7e56xef9d9a9f64asdas8021808dc747370d4caa',
                'is_verified' => 1
              
            ],
            [
                'name' => 'ahmed',
                'email' => 'ahmed@gmail.com',
                'password' => Crypt::encrypt("ahmed123"),
                'phone' => '0315789456',
                'address' => 'xyz street, lahore',
                'verification_code' => '5f7e56x4s859a9f64asdas8021808dc747370d4caa',
                'is_verified' => 1
                
            ]
        ]);
    }
}
