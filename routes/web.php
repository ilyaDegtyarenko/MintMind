<?php

$app->get('{any:.*}', function () {
    return view('app');
});

//$app->group(['prefix' => 'auth'], function () use ($app) {
//    $app->post('registration', ['middleware' => 'guest', 'uses' => 'AuthController@register']);
//    $app->post('login', ['middleware' => 'guest', 'uses' => 'AuthController@login']);
//    $app->post('logout', ['middleware' => 'auth', 'uses' => 'AuthController@logout']);
//});

//$app->post('re-captcha/verify', 'GoogleReCaptcha@verify');

//$app->group(['middleware' => ['auth', 'csrf']], function () use ($app) {
//
//});
