<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'V-neck T-shirt',
                'description' => 'V-Neck T-shirt For Men'     
            ],
            [
                'title' => 'Formal T-shirt',
                'description' => 'Formal T-shirt For Men'     
            ],
            [
                'title' => 'Casual T-shirt',
                'description' => 'Casual Tees for men and women'     
            ],
            [
                'title' => 'T-Shirt',
                'description' => 'For men'     
            ]
        
        ]);
    }
}
