<?php

namespace Services\Api;

use Illuminate\Http\Request;

class Api
{
	public function request($method, $service_name, $uri, $params = [])
	{
		$uri = trim($uri, '/ ');
		$uri = "/service/$service_name/$uri";
		$request = Request::create($uri, $method, $params);
		$response = app()->handle($request)->getContent();
		return $response;
	}
}
