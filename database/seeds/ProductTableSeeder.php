<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'brand_id' => 1,
                'title' => 'T-shirt',
                'description' => 'Original',
                'price' => '500',
                'is_featured'=> 1  
                  
            ],
            [
                'category_id' => 2,
                'brand_id' => 1,
                'title' => 'Polo T-shirt',
                'description' => '100% Original',
                'price' => '500',
                'is_featured'=> 1  
            ],
            [
                'category_id' => 2,
                'brand_id' => 2,
                'title' => 'Blue T-shirt',
                'description' => 'For men',
                'price' => '500',
                'is_featured'=> 1       
            ],
            [
                'category_id' => 1,
                'brand_id' => 3,
                'title' => 'Black Formal T-shirt',
                'description' => 'For Men',
                'price' => '500',
                'is_featured'=> 1      
            ],
            [
                'category_id' => 2,
                'brand_id' => 4,
                'title' => 'Half sleeves Tshirt',
                'description' => '100% Orignal',
                'price' => '500'     
            ]

          
        
        ]);
    }
}
