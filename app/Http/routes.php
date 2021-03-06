<?php

require "newRouteCompact.php";


Route::get('migrate', function () {\Artisan::call('migrate:refresh'); return '<pre>' . \Artisan::output() . '</pre>'; });
Route::get('seed', function () {\Artisan::call('db:seed'); return '<pre>' . \Artisan::output() . '</pre>'; });
Route::get('vc', function () {\Artisan::call('views:clear'); return '<pre>' . \Artisan::output() . '</pre>'; });
Route::get('env', function () {dd(App::environment()); });
Route::get('info', function () {if (App::environment() != 'production') {phpinfo(); } });
Route::get('/rr', function ()
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
Route::get('cc', function () {\Artisan::call('cache:clear'); return '<pre>' . \Artisan::output() . '</pre>'; });
Route::get('rc', function () {\Artisan::call('route:clear'); return '<pre>' . \Artisan::output() . '</pre>'; });



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


Route::get('/', ['as' => 'upload', 'uses' => 'ImageController@getUpload']);
Route::post('upload', ['as' => 'upload-post', 'uses' =>'ImageController@postUpload']);
Route::post('upload/delete', ['as' => 'upload-remove', 'uses' =>'ImageController@deleteUpload']);

/**
 * Part 2 - Display already uploaded images in Dropzone
 */
Route::get('example-2', ['as' => 'upload-2', 'uses' => 'ImageController@getServerImagesPage']);
Route::get('server-images', ['as' => 'server-images', 'uses' => 'ImageController@getServerImages']);