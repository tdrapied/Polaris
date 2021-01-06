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

$router->get('logout', ['as' => 'security_logout', 'uses' => 'SecurityController@logout']);

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

$router->group(['prefix' => 'edit/{id:[0-9]+}', 'middleware' => 'auth'], function () use ($router) {

    $router->get('/', ['as' => 'post_edit', 'uses' => 'PostController@form']);
    $router->post('/', 'PostController@form');

});

$router->get('search', ['as' => 'post_search', 'uses' => 'PostController@search']);
$router->get('random', ['as' => 'post_random', 'uses' => 'PostController@random']);
$router->get('delete/{id:[0-9]+}', [ 'as' => 'post_delete', 'middleware' => 'auth', 'uses' => 'PostController@delete' ]);

/**
 * Admin
 */
$router->group(['prefix' => 'admin', 'middleware' => 'auth'], function () use ($router) {

    /**
     * Posts
     */
    $router->get('posts', [ 'as' => 'admin_post_list', 'uses' => 'AdminPostController@list' ]);
    $router->get('posts/enable/{id:[0-9]+}', [ 'as' => 'admin_post_enable', 'uses' => 'AdminPostController@enable' ]);
    $router->get('posts/disable/{id:[0-9]+}', [ 'as' => 'admin_post_disable', 'uses' => 'AdminPostController@disable' ]);

    /**
     * Users
     */
    $router->get('users', ['as' => 'admin_user_list', 'uses' => 'AdminUserController@list']);
    $router->group(['prefix' => 'users/edit/{id:[0-9]+}'], function () use ($router) {

        $router->get('/', ['as' => 'admin_user_edit', 'uses' => 'AdminUserController@edit']);
        $router->post('/', 'AdminUserController@edit');

    });

});
