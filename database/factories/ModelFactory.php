<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

//https://placebear.com/g/200/300
// Begin Product Factory   fillmurray.com/730/350
// // factory(App\Product::class)->create();

$factory->define(App\Product::class, function (Faker\Generator $faker) {

    return [
        'product_name' => $faker->unique()->word,
        'upc' => $faker->ean13,
        'sku' => str_random(8),
        'description' =>  $faker->paragraph,
        'price' => $faker->numberBetween($min = 1000, $max = 9000),

    ];
});

// factory(App\Models\ProductImage::class, 6)->create();

$factory->define(App\Models\ProductImage::class, function (Faker\Generator $faker) {

	$product_id = array_pluck(App\Product::all(), 'id');
	$width = 730;
	$height = 350;
	$lorem_images = [
			'https://spaceholder.cc/widthxheight' ,
			'https://placebear.com/width/height',
			'http://fillmurray.com/width/height',
			'http://www.placecage.com/width/height',
			'http://placekitten.com/width/height',
			'http://baconmockup.com/width/height/'
	];
	$provider = $lorem_images[array_rand([0, 1, 2 ,3,4,5])];
	$path = str_replace('height', $height, str_replace('width', $width, $provider));

	return [
        'product_id' => 1,
        'path' => $path,



    ];
});

//'product_id' => $faker->numberBetween($min = 1, $max = 4),
////use bheller\ImagesGenerator\ImagesGeneratorProvider;

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'img' => $faker->imageGenerator(null, 640, 480, 'png', false, true, '#1f1f1f', '#ff2222'), //composer require bheller/images-generator
    ];
});
// End Product Factory
