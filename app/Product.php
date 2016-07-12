<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Models\ProductImage;

class Product extends Model
{
    protected $guarded  = ['id'];
    protected $fillable = ['product_name', 'upc', 'sku', 'description', 'price'];



	/**
	 * Relationship with the image model.
	 *
	 * @author	Phillip Madsen
	 * @return	\Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function images()
	{
		return $this->hasMany(\App\Models\ProductImage::class);
	}


	public function getPriceAttribute($price)
	{
		return '$'. number_format($price, 2, '.', '');
	}

}
