<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'address' => '123 E Store, Los Angeles, USA',
                'email' => 'store@gmail.com',
                'phone' => '+123-456-7890',
                'fb' => 'https://www.facebook.com/',
                'twitter' => 'https://www.twitter.com/',
                'insta' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                
            ]
        ]);
    }
}
