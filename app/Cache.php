<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Cache extends Model
{
    public $table = "cache";

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
