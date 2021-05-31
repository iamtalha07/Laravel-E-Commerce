<?php

namespace App;

use App\Cart;
use App\Brand;
use App\Cache;
use App\Image;
use App\Category;
use App\OrderDetails;
use App\ProductsAttributes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function attributes()
    {
        return $this->hasMany(ProductsAttributes::class,'product_id','id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetails::class,'product_id','id');
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }

    public function getImages()
    {
        return $this->morphMany(Image::class,'imageable')->where('type','master');
    }
    public function getImagesChild()
    {
        return $this->morphMany(Image::class,'imageable')->where('type','Child');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function cache()
    {
        return $this->hasMany(Cache::class);
    }
}
