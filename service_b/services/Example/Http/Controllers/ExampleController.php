<?php

namespace Services\Example\Http\Controllers;

class ExampleController extends Controller
{
	public function showExample($name)
	{
		return response()->json(['Example' => $name]);
	}
}
