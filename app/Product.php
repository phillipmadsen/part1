<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = ['product_name', 'images'];





    /**
     * Relationship with the image model.
     *
     * @author	Phillip Madsen
     * @return	\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
    	return $this->hasMany(Image::class, 'image_product');
    }


}


