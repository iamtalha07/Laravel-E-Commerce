<?php

namespace App;

use App\Image;
use App\Banner;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }

    public function banners()
    {
        return $this->hasMany(Banner::class,'category_id','id');
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }

    public function getImages()
    {
        return $this->morphMany(Image::class,'imageable')->where('type','master');
    }

  
}
