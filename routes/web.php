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
$router->group(['prefix' => 'signup'], function () use ($router) {

    $router->get('/', ['as' => 'security_signup', 'uses' => 'SecurityController@signup']);
    $router->post('/', 'SecurityController@signup');

});

 /**
  * Post
  */

$router->group(['prefix' => 'new', 'middleware' => 'auth'], function () use ($router) {

    $router->get('/', ['as' => 'post_new', 'uses' => 'PostController@form']);
    $router->post('/', 'PostController@form');

});

$router->group(['prefix' => 'edit/{id:[0-9]+}'], function () use ($router) {

    $router->get('/', ['as' => 'post_edit', 'uses' => 'PostController@form']);
    $router->post('/', 'PostController@form');

});

$router->get('delete/{id:[0-9]+}', [ 'as' => 'post_delete', 'uses' => 'PostController@delete' ]);

$router->get('search', ['as' => 'post_search', 'uses' => 'PostController@search']);

$router->get('random', ['as' => 'post_random', 'uses' => 'PostController@random']);

/**
 * Admin
 */

$router->group(['prefix' => 'admin'], function () use ($router) {

    # $router->get('users', [ 'as' => 'users_list', 'uses' => 'PostController@list' ]);

});
