<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;


class SearchController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Search Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	public function people(Request $request)
	{
		$name = $request->input('keyword');
		$user = Auth::user();
		$result = User::select('*')->where('name', 'like', '%'.$name.'%');
		if($user != null)			
			$result->where('id', '!=', $user->id);

		return view('search/pople')
		->with('users', $result->get());
	}
}