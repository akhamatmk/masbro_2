<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilterUser;
use Session;

class FilterController extends Controller
{
	function getParent()
	{
		$filter = FilterUser::where('parent_id', 0)->get();
		return response()->json($filter);
	}

	function getChild($child)
	{
		$filter = FilterUser::where('parent_id', $child)->get();
		return response()->json($filter);	
	}
}