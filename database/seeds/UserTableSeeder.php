<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'talha',
                'email' => 'talha@gmail.com',
                'password' => Crypt::encrypt("taha123"),
                'address' => 'xyz street, karachi',
                'phone' => '0347123456'
            ],
            [
                'name' => 'taha',
                'email' => 'taha@gmail.com',
                'password' =>  Crypt::encrypt("taha123"),
                'address' => 'xyz street, lahore',
                'phone' => '0315789456'
            ]
        ]);
    }
}
