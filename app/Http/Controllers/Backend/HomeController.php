<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;

class HomeController extends Controller
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
		return view('backend/index')->with('user', Auth::user());
	}

	public function logout()
	{
		Auth::logout();
        return redirect('backend/admin/login');
	}
}
