<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Models\ProductImage;

class Product extends Model
{
    protected $guarded  = ['id'];
	public $timestamps = true;
	protected $fillable = array('product_name', 'price', 'sku', 'upc', 'description');
	protected $visible = array('product_name', 'price', 'sku', 'upc', 'description');

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




	public function scopePreUploadImagesBeforeProductCreation($query, $id )
	{

		return $query->where(compact('id'))->first();
	}

}
