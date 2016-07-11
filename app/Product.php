<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name', 'images'];


public function images()
{
    return $this->morphMany(App\Models\Image::class, 'imageable');
}

}
