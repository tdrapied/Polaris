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
$router->group(['prefix' => 'new', 'middleware' => 'role'], function () use ($router) {

    $router->get('/', ['as' => 'post_new', 'uses' => 'PostController@form']);
    $router->post('/', 'PostController@form');

});

$router->group(['prefix' => 'edit/{id:[0-9]+}', 'middleware' => 'role'], function () use ($router) {

    $router->get('/', ['as' => 'post_edit', 'uses' => 'PostController@form']);
    $router->post('/', 'PostController@form');

});

$router->get('search', ['as' => 'post_search', 'uses' => 'PostController@search']);
$router->get('random', ['as' => 'post_random', 'uses' => 'PostController@random']);
$router->get('delete/{id:[0-9]+}', [ 'as' => 'post_delete', 'middleware' => 'role', 'uses' => 'PostController@delete' ]);

/**
 * Admin
 */
$router->group(['prefix' => 'admin'], function () use ($router) {

    /**
     * Posts : /admin/posts
     */
    $router->group(['prefix' => 'posts', 'middleware' => 'role:MODERATOR'], function () use ($router) {

        $router->get('/', [ 'as' => 'admin_post_list', 'uses' => 'AdminPostController@list' ]);
        $router->get('delete/{id:[0-9]+}', [ 'as' => 'admin_post_delete', 'uses' => 'AdminPostController@delete' ]);
        $router->get('enable/{id:[0-9]+}', [ 'as' => 'admin_post_enable', 'uses' => 'AdminPostController@enable' ]);
        $router->get('disable/{id:[0-9]+}', [ 'as' => 'admin_post_disable', 'uses' => 'AdminPostController@disable' ]);

        $router->group(['prefix' => 'edit/{id:[0-9]+}'], function () use ($router) {

            $router->get('/', ['as' => 'admin_post_edit', 'uses' => 'AdminPostController@edit']);
            $router->post('/', 'AdminPostController@edit');

        });

    });

    /**
     * Users : /admin/users
     */
    $router->group(['prefix' => 'users', 'middleware' => 'role:ADMIN'], function () use ($router) {

        $router->get('/', ['as' => 'admin_user_list', 'uses' => 'AdminUserController@list']);
        $router->group(['prefix' => 'edit/{id:[0-9]+}'], function () use ($router) {

            $router->get('/', ['as' => 'admin_user_edit', 'uses' => 'AdminUserController@edit']);
            $router->post('/', 'AdminUserController@edit');

        });

    });

});
