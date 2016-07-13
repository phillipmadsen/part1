<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        $router->pattern('id', '[0-9]+');
        $router->pattern('product_name', '[a-z]+');



        parent::boot($router);

        $router->model('user', 'App\User');
        $router->model('product', 'App\Product');
        $router->model('ProductImage', 'App\Models\ProductImage');
        $router->model('productimage', 'App\Models\ProductImage');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });

        $router->bind('product', function($value) {
            return App\Product::where('id', $value)->first();
        });
    }
}
