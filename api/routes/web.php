<?php

use OpenApi\Annotations as OA;


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/**
 * @OA\Info(title="Lumen Cafe API", version="0.1")
 */


$router->get('/', function () use ($router) {
    return \App\Product::all();
});


$router->group(['prefix' => 'products'], function() use($router){
    /**
     * @OA\Get(
     *     path="/products",
     *     summary="List all products.",
     *     description="Returns all stored products with pagination.",
     *     @OA\Response(
     *         response="200", 
     *         description="Array of products"
     *      ),
     *     @OA\Response(
     *         response=404,
     *         description="Could Not Find Resource"
     *     )  
     * )
    */
    $router->get('/', 'ProductController@index');

    $router->get('/{product}', 'ProductController@show');

    $router->post('/', 'ProductController@store');
    $router->put('/{product}', 'ProductController@update');
    $router->delete('/{product}', 'ProductController@destroy');
});
