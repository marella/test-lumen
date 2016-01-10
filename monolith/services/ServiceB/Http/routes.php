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

$app->configure('services/service-b');

$app->group(['prefix' => 'service/service-b', 'namespace' => 'Services\ServiceB\Http\Controllers'], function ($app) {
	$app->get('{name}', 'ServiceBController@showServiceB');
});
