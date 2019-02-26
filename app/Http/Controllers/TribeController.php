<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tribe;
use Session;

class TribeController extends Controller
{
	function get()
	{
		$tribe = Tribe::where('name', 'like', '%' . $_GET['text'] . '%')->get();
		return response()->json($tribe);
	}
}