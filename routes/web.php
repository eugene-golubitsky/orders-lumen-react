<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->post('api/auth', ['uses' => 'AuthController@index']);

$router->get('api/product/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@getproduct']);
$router->post('api/products/', ['middleware' => 'auth', 'uses' => 'ProductController@getproducts']);
$router->post('api/inventory/', ['middleware' => 'auth', 'uses' => 'InventoryController@index']);

/**
 * TODO
 *
 * $router->put('api/product', ['uses' => 'ProductController@createProduct']);
 * $router->patch('api/product/{id}', ['uses' =>'ProductController@updateProduct']);
 * $router->delete('api/product/{id}', ['uses' =>'ProductController@deleteProduct']);
 *
 */

