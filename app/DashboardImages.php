<?php

namespace App;

use App\Image;
use Illuminate\Database\Eloquent\Model;

class DashboardImages extends Model
{
    protected $table = "dashboard_images";

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
    public function imagetop()
    {
        return $this->morphMany(Image::class,'imageable')->where('type','bannerTop');
    }
    public function imagebottom()
    {
        return $this->morphMany(Image::class,'imageable')->where('type','bannerBottom');
    }
}
