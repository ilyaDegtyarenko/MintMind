<?php

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

/*Index route.*/
$app->get('{any:.*}', 'IndexController@index');

/*Auth routes.*/
$app->group(['prefix' => 'auth'], function () use ($app) {
    $app->post('registration', ['middleware' => 'guest', 'uses' => 'AuthController@register']);
    $app->post('login', ['middleware' => 'guest', 'uses' => 'AuthController@login']);
    $app->post('logout', ['middleware' => 'auth', 'uses' => 'AuthController@logout']);
});

/*Routes for authorized users.*/
$app->group(['middleware' => ['auth', 'csrf']], function () use ($app) {

});