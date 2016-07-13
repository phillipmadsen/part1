<?php
Route::get('/r', function ()
{
	function philsroutes()
	{
		$i=0;
		$routeCollection = Route::getRoutes();
		echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">';
		echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css">';
		echo '<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>';
		echo "<div style='margin-top:150px'></div><div class='container'><div class='col-md-12 table-responsive'>";
		echo "<table id='table' data-toggle='table' class='table table-condensed' style='width:100%'>";
		echo '<thead>';
			echo '<tr>';
				echo "<th width='5%'> </th>";
				echo "<th width='10%'><h4>Method</h4></th>";
				echo "<th width='25%'><h4>URL</h4></th>";
				echo "<th width='25%'><h4>Route Name</h4></th>";
				echo "<th width='30%'><h4>Corresponding Action</h4></th>";
			echo '</tr>';
		echo '<thead>';

		foreach ($routeCollection as $value)
		{
			$number = $i++;
			$secretrow = "secretrow";
			echo '<tr data-toggle="collapse" data-target="#'.$secretrow.$number.'" class="accordion-toggle">';
				echo '<td><button type="button" class="btn btn-info btn-md"><i class="glyphicon glyphicon-plus"></i></button></td>';
				echo '<td>' . $value->getMethods()[0] . '</td>';
				echo "<td  style='font-family:Inconsolata;font-size: 1.25em;''><a href='" . $value->getPath() . "' target='_blank'>" . $value->getPath() . '</a> </td>';
				echo '<td>' . $value->getName() . '</td>';
				echo '<td>' . $value->getActionName() . '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td colspan="12" class=""> <div class="accordian-body collapse table-responsive" id="'.$secretrow.$number.'"><div style="clear:both"></div>';
					echo '<table class="table table-bordered"><thead><tr><td><a href="' . $value->getPath() . '"><strong>Visit This Link</strong></a></td></tr><tr><th>Copy Url</th></tr></thead>';
						echo '<tbody>';
						echo '<tr><td align="left"><pre style="font-family: Inconsolata;font-size: 1.25em;">{!! url(\'' . $value->getPath() . '\') !!}</pre></td></tr>';
						echo '<tr><td><strong>Copy Form Url</strong></td></tr>';
						echo '<tr><td align="left"><pre style="font-family:Inconsolata;font-size: 1.25em;">{!! Form::open([\'url\' => \'' . $value->getPath() . '\', \'method\' => \'post\', \'files\' => true]) !!}</pre></td></tr>';
						echo '<tr><td align="left"><strong>Copy Url Route</strong> </td></tr>';
						echo '<tr><td align="left"><pre style="font-family: Inconsolata;font-size: 1.25em;">{!! route(\'' . $value->getName() . '\') !!}</pre></td></tr>';
						echo '<tr><td align="left"><strong>Copy Form:: Route</strong> </td></tr>';
						echo '<tr><td align="left"><pre style="font-family:Inconsolata;font-size: 1.25em;">{!! Form::open([\'route\' => \''. $value->getName() .'\', \'method\' => \'post\', \'files\' => true]) !!}</pre></td></tr>';
						echo '<tr><td align="left"><strong>Copy Url Action</strong> </td></tr>';
						echo '<tr><td align="left"><pre style="font-family:Inconsolata;font-size: 1.25em;">{!! action(\'' . $value->getActionName() . '\']) !!}</pre></td></tr></tr>';
						echo '<tr><td align="left"><strong>Copy Form:: Action</strong> </td></tr>';
						echo '<tr><td align="left"><pre style="font-family:Inconsolata;font-size: 1.25em;"> {!! Form::open([\'action\' => \'' . $value->getActionName() . '\', \'method\' => \'post\', \'files\' => true]) !!}</pre></td></tr>';
					echo '</tbody></table></div>';
				echo '</td>';
			echo '</tr>';
		}
		echo '</table></div></div>';
		echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>';

	}
	return philsroutes();
});

Route::get('product/{product}', function(App\Product $product) {
	//
});

Route::get('user/profile', ['as' => 'profile', function () {
	//
}]);

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


// dd(route('upload'));


Route::get('product/{id}', function ($id) {
	  return 'Product '.$id;
});

Route::get('product/{product}', function ($id) {
	  return 'Product '.$id;
});


Route::get('users/{user}', function(App\User $user){
	return	$user;
	// $user = App\User::findOrFail($userID);
})
