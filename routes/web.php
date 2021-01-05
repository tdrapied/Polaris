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

$router->group(['prefix' => 'login'], function () use ($router) {

    $router->get('/', ['as' => 'security_login', 'uses' => 'SecurityController@login']);
    $router->post('/', 'SecurityController@login');

});

$router->group(['prefix' => 'signup'], function () use ($router) {

    $router->get('/', ['as' => 'security_signup', 'uses' => 'SecurityController@signup']);
    $router->post('/', 'SecurityController@signup');

});

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

$router->get('delete/{id:[0-9]+}', [ 'as' => 'post_delete', 'uses' => 'PostController@delete' ]);

$router->get('search', ['as' => 'post_search', 'uses' => 'PostController@search']);

$router->get('random', ['as' => 'post_random', 'uses' => 'PostController@random']);


$router->get('delete/{id:[0-9]+}', [ 'as' => 'post_delete', 'uses' => 'PostController@delete' ]);

/**
 * Admin Post
 */

$router->get('validation', ['as' => 'validation', 'uses' => 'AdminController@listAll']);

$router->get('activate/{id:[0-9]+}', [ 'as' => 'post_activate', 'uses' => 'AdminController@activate' ]);

$router->get('deactivate/{id:[0-9]+}', [ 'as' => 'post_deactivate', 'uses' => 'AdminController@deactivate' ]);

/**
 * CRUD_user
 */
$router->get('user', ['as' => 'user_index', 'uses' => 'UserController@index']);
$router->get('user/{id}/edit', ['as' => 'user_edit', 'uses' => 'UserController@edit']);
$router->patch('user/{id}', ['as' => 'user_update', 'uses' => 'UserController@update']);
$router->get('user/{id}/delete', ['as' => 'user_delete', 'uses' => 'UserController@delete']);
$router->delete('user/{id}', ['as' => 'user_destroy', 'uses' => 'UserController@destroy']);

// $router->group(['prefix' => 'admin'], function () use ($router) {

//     # $router->get('users', [ 'as' => 'users_list', 'uses' => 'PostController@list' ]);

// });
