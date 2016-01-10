<?php

namespace Services\ServiceA\Http\Controllers;

class ServiceAController extends Controller
{
	public function showServiceA($name)
	{
		return response()->json(['ServiceA' => $name]);
	}
}
