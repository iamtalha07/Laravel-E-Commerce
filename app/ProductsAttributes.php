<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class ProductsAttributes extends Model
{
    //
    protected $table="products_attributes";

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
