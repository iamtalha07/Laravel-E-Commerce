<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
