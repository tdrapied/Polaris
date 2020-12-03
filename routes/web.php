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

$router->get('/', ['as' => 'home', 'uses' => 'PostController@list']);

$router->get('new', ['as' => 'post_new', 'uses' => 'PostController@new']);
$router->post('new', ['as' => 'post_new', 'uses' => 'PostController@new']);

$router->get('random', ['as' => 'post_random', 'uses' => 'PostController@random']);