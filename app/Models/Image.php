<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Image extends Model
{
	protected $table = 'products';
    public static $rules = [
        'file' => 'required|mimes:png,gif,jpeg,jpg,bmp'
    ];

    public static $messages = [
        'file.mimes' => 'Uploaded file is not in image format',
        'file.required' => 'Image is required'
    ];



    /**
     * Relationship with the product model.
     *
     * @author	Phillip Madsen
     * @return	\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
    	return $this->hasMany(Product::class, 'image_product');
    }


}
