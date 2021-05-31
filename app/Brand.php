<?php

namespace App;

use App\Image;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class,'brand_id','id');
    }
    
    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
}
