<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            [
                'name' => 'Banner 1',
                'category_id' => 1,
                'Content' => 'Great Quality Products'     
            ],
            [
                'name' => 'Banner 2',
                'category_id' => 2,
                'Content' => 'Great Quality Products'     
            ],
            [
                'name' => 'Banner 3',
                'category_id' => 3,
                'Content' => 'Great Quality Products'     
            ],
          
        
        ]);
    }
}
