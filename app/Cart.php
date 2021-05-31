<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $table = "cart";

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
