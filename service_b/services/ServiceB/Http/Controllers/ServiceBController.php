<?php

namespace Services\ServiceB\Http\Controllers;

use \Services\Api\Api;

class ServiceBController extends Controller
{
	public function showServiceB(Api $api, $name)
	{
		$response = $api->request('GET', 'service-a', 'from-service-b');
		$response = json_decode($response, true);
		return response()->json(['ServiceB' => $name, 'Test Service A' => $response]);
	}
}
