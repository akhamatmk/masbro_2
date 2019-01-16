<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;


class LoginController extends Controller
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
		return view('backend/login');
	}

	public function check(Request $request)
	{
		$validatedData = $request->validate([
		 	'email' => 'required|max:255',
		 	'password' => 'required',
		]);

		$userdata = array(
			'email' => $request->email ,
			'password' => $request->password
		);

		$userdata2 = array(
		 	'user_id' => $request->email ,
		 	'password' => $request->password
		);

		$p = Hash::make('password');

		if (Auth::attempt($userdata))
        	return redirect('backend/admin');

      	if (Auth::attempt($userdata2))
         	return redirect('backend/admin');

      	Session::flash('message', 'Wrong email or No telepon or password');
      	return redirect('backend/admin/login');
	}
}
