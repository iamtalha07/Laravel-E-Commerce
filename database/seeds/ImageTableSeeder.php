<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'image' => 'cat1.jpg',
                'type' => 'master',
                'imageable_id' => 1,
                'imageable_type' => 'App\Category'
            ],
            [
                'image' => 'cat2.jpg',
                'type' => 'master',
                'imageable_id' => 2,
                'imageable_type' => 'App\Category'
            ],
            [
                'image' => 'cat3.jpg',
                'type' => 'master',
                'imageable_id' => 3,
                'imageable_type' => 'App\Category'
            ],
            [
                'image' => 'cat4.jpg',
                'type' => 'master',
                'imageable_id' => 4,
                'imageable_type' => 'App\Category'
            ],
            [
                'image' => 'pro1.jpg',
                'type' => 'master',
                'imageable_id' => 1,
                'imageable_type' => 'App\Product'
            ],
            [
                'image' => 'pro2.jpg',
                'type' => 'master',
                'imageable_id' => 2,
                'imageable_type' => 'App\Product'
            ],
            [
                'image' => 'pro3.jpg',
                'type' => 'master',
                'imageable_id' => 3,
                'imageable_type' => 'App\Product'
            ],
            [
                'image' => 'pro4.jpg',
                'type' => 'master',
                'imageable_id' => 4,
                'imageable_type' => 'App\Product'
            ],
            [
                'image' => 'pro5.jpg',
                'type' => 'master',
                'imageable_id' => 5,
                'imageable_type' => 'App\Product'
            ],

            // [
            //     'image' => 'a.jpg',
            //     'type' => 'Child',
            //     'imageable_id' => 1,
            //     'imageable_type' => 'App\Product'
            // ],
            // [
            //     'image' => 'b.jpg',
            //     'type' => 'Child',
            //     'imageable_id' => 1,
            //     'imageable_type' => 'App\Product'
            // ],
            // [
            //     'image' => 'c.jpg',
            //     'type' => 'Child',
            //     'imageable_id' => 1,
            //     'imageable_type' => 'App\Product'
            // ],

            [
                'image' => 'brand-1.png',
                'type' => null,
                'imageable_id' => 1,
                'imageable_type' => 'App\Brand'
            ],
            [
                'image' => 'brand-2.png',
                'type' => null,
                'imageable_id' => 2,
                'imageable_type' => 'App\Brand'
            ],
            [
                'image' => 'brand-3.png',
                'type' => null,
                'imageable_id' => 3,
                'imageable_type' => 'App\Brand'
            ],
            [
                'image' => 'brand-4.png',
                'type' => null,
                'imageable_id' => 4,
                'imageable_type' => 'App\Brand'
            ],
            [
                'image' => 'brand-5.png',
                'type' => null,
                'imageable_id' => 5,
                'imageable_type' => 'App\Brand'
            ],
            [
                'image' => 'brand-6.png',
                'type' => null,
                'imageable_id' => 6,
                'imageable_type' => 'App\Brand'
            ],

            [
                'image' => 'slider-1.jpg',
                'type' => null,
                'imageable_id' => 1,
                'imageable_type' => 'App\Banner'
            ],
            [
                'image' => 'slider-2.jpg',
                'type' => null,
                'imageable_id' => 2,
                'imageable_type' => 'App\Banner'
            ],
            [
                'image' => 'slider-3.jpg',
                'type' => null,
                'imageable_id' => 3,
                'imageable_type' => 'App\Banner'
            ]
           
        ]);
    }
    }

