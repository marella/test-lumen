<?php

use \Services\Api\Api;

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

$app->configure('app');

$app->group(['namespace' => 'App\Http\Controllers'], function ($app) {
	$app->get('/', function () use ($app) {
	    return $app->welcome();
	});

	$app->get('/hello/{name}', function ($name) use ($app) {
	    return "Hello $name";
	});

	$app->get('/test', function (Api $api) use ($app) {
		echo "Service A: " . $api->request('GET', 'service-a', 'from-app') . "<br>";
		echo "Service B: " . $api->request('GET', 'service-b', 'from-app') . "<br>";
	    return '';
	});
});
