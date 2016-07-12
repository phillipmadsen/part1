<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ProductImage extends Model
{
	protected $table = 'product_images';
	public $timestamps = true;
	protected $visible = ['path'];
	protected $fillable = ['id', 'path', 'product_id'];

	public static $rules = [
			'file' => 'required|mimes:png,gif,jpeg,jpg,bmp'
	];

	public static $messages = [
			'file.mimes' => 'Uploaded file is not in image format',
			'file.required' => 'Image is required'
	];

 	public function product()
 	{
        return $this->belongsTo(App\Product::class);
    }
 }
