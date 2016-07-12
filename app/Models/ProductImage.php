<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ProductImage extends Model
{
	protected $table = 'product_images';

	protected $fillable = ['id', 'path', 'product_id'];

 	public function product()
 	{
        return $this->belongsTo(App\Product::class);
    }
}
;
