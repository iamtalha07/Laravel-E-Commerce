<?php

use Illuminate\Database\Seeder;

class FeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('features')->insert([
            [
                'title' => 'Secure Payment',
                'content' => 'Lorem ipsum dolor sit amet consectetur',
                'icon' => '<i class="fab fa-cc-mastercard"></i>',
                'is_active' => 1,      
            ],
            [
                'title' => 'Worldwide Delivery',
                'content' => 'Lorem ipsum dolor sit amet consectetur',
                'icon' => '<i class="fa fa-truck"></i>',
                'is_active' => 1,      
            ],
            [
                'title' => '90 Days Return',
                'content' => 'Lorem ipsum dolor sit amet consectetur',
                'icon' => '<i class="fa fa-sync-alt"></i>',
                'is_active' => 1,      
            ],
            [
                'title' => '24/7 Support',
                'content' => 'Lorem ipsum dolor sit amet consectetur',
                'icon' => '<i class="fa fa-comments"></i>',
                'is_active' => 1,      
            ]
            
        ]);
    }
}
