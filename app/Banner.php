<?php

namespace App;

use App\Image;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
