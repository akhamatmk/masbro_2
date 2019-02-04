<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FilterUser;
use Auth;
//use App\Imports\CategoryJobsImport;

class FilterController extends BackendController
{
	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	public function index()
	{
		$filters = FilterUser::with('children')->where('parent_id', 0)->get();
		return view('backend/filter/index')->with('filters', $filters);
	}

	public function destroy($id, Request $request)
	{
		$filters = FilterUser::find($id);
		if($filters)
			$filters->delete();

		return null;
	}


	public function edit($id, Request $request)
	{
		$filters = FilterUser::find($id);
		if($filters){
			$filters->name = $request->text;
			$filters->save();
		}

		return $filters;
	}

	public function add(Request $request)
	{
		$parent_id = $request->parent_id;
		$name = $request->name;
		$filters = new  FilterUser;
		$filters->name = $name;
		$filters->parent_id = (int) $parent_id;
		$filters->save();
		return $filters;
	}
}