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

/**
 * Homepage
 */

$router->get('/', ['as' => 'home', 'uses' => 'PostController@list']);

/**
 * Security
 */

$router->get('login', ['as' => 'security_login', 'uses' => 'SecurityController@login']);
$router->get('signup', ['as' => 'security_signup', 'uses' => 'SecurityController@signup']);

 /**
  * Post
  */

$router->group(['prefix' => 'new'], function () use ($router) {

    $router->get('/', ['as' => 'post_new', 'uses' => 'PostController@form']);
    $router->post('/', 'PostController@form');

});

$router->group(['prefix' => 'edit/{id:[0-9]+}'], function () use ($router) {

    $router->get('/', ['as' => 'post_edit', 'uses' => 'PostController@form']);
    $router->post('/', 'PostController@form');

});

$router->get('search', ['as' => 'post_search', 'uses' => 'PostController@search']);

$router->get('random', ['as' => 'post_random', 'uses' => 'PostController@random']);
