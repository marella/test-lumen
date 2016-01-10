<?php

namespace Services\Api;

use Illuminate\Http\Request;

class Api
{
	public function request($method, $service_name, $uri, $params = [])
	{
		$base_url = 'http://localhost/test/test-lumen/';
		$urls = [
			'service-a' => $base_url . 'service_a/public',
			'service-b' => $base_url . 'service_b/public',
		];
		$uri = trim($uri, '/ ');
		$uri = "$urls[$service_name]/service/$service_name/$uri";
		$response = file_get_contents($uri);
		return $response;
	}
}
