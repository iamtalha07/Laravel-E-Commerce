<?php

namespace App;

use App\Product;
use App\customer;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(customer::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'order_details')->withPivot('quantity','price');
    }
}
