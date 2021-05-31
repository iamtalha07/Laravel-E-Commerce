<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
  //$this->call([UserTableSeeder::class,CustomerTableSeeder::class,CategoryTableSeeder::class,ProductTableSeeder::class,ImageTableSeeder::class]);
     //  $this->call(ImageTableSeeder::class);
  $this->call([UserTableSeeder::class,CustomerTableSeeder::class,CategoryTableSeeder::class,BrandTableSeeder::class,ProductTableSeeder::class,BannerTableSeeder::class,ImageTableSeeder::class,SettingTableSeeder::class,FeatureTableSeeder::class]);
         
       // $this->call(UserTableSeeder::class);
    }
}
