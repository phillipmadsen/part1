<?php
Route::get('/r', function ()
{
    function philsroutes()
    {
        $routeCollection = Route::getRoutes();
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">';
        echo "<div class='container'><div class='col-md-12'><table class='table table-striped' style='width:100%'>";
        echo '<tr>';
        echo "<td width='10%'><h4>HTTP Method</h4></td>";
        echo "<td width='45%'><h4>Route</h4></td>";
        echo "<td width='45%'><h4>Corresponding Action</h4></td>";
        echo '</tr>';
        foreach ($routeCollection as $value)
        {
            echo '<tr>';
            echo '<td>' . $value->getMethods()[0] . '</td>';
            echo "<td><a href='" . $value->getPath() . "' target='_blank'>" . $value->getPath() . '</a> </td>';
            echo '<td>' . $value->getActionName() . '</td>';
            echo '</tr>';
        }
        echo '</table></div></div>';
        echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>';
    }
    return philsroutes();
});

// Route::bind('product',function($product){
//     return App\Product::where('product_name','=', $product)->first();
// });
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
	//Route::model('product', 'App\Product');
	//Route::model('productimage', 'App\Models\ProductImage');

 Route::get('/', ['as' => 'upload', 'uses' => 'ImageController@getUpload']);
 Route::post('upload', ['as' => 'upload-post', 'uses' =>'ImageController@postUpload']);
 Route::post('upload/delete', ['as' => 'upload-remove', 'uses' =>'ImageController@deleteUpload']);



/**
 * Part 2 - Display already uploaded images in Dropzone
 */
 Route::get('example-2', ['as' => 'upload-2', 'uses' => 'ImageController@getServerImagesPage']);
 Route::get('server-images', ['as' => 'server-images', 'uses' => 'ImageController@getServerImages']);

// Begin Product Routes

	//Route::model('product', 'App\Product');
//	Route::pattern('slug', '[a-z0-9- _]+');

Route::any('api/product', 'ApiController@productData');
Route::any('api/product-vue', 'ApiController@productVueData');

// Route::get('/product/{product}', 'ProductController@show');
Route::resource('product', 'ProductController');
// Route::post('product/upload/images', 'ProductController@addImage');

Route::post('productimage/upload',['as' => 'productimage/upload', 'uses' => 'ProductController@addImage']);


