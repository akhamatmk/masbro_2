<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regency;

class LocationController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Location Controller 
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	public function region(Request $request)
	{
		$text = strtolower($request->text);
		$regency = Regency::select('name')->where('name', 'like', '%'.$text.'%')->groupBy('name')->limit(10)->get();
		return response()->json($regency);
	}
}