<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Regency;
use App\Models\District;
use Auth;
use Session;
use Hash;


class RegencyController extends Controller
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
		$regencys = regency::paginate(35);
		return view('backend/place/regency')->with('regencys', $regencys);
	}

	public function change_status($id, $status)
	{
		$regencys = Regency::find($id);
		if($regencys)
		{
			if($status == 1)
				$status = 0;
			else
				$status = 1;

			$regencys->status = $status;
			$regencys->save();
		}

		return redirect('backend/admin/regency');
	}

	public function district()
	{
		$districts = District::paginate(35);
		return view('backend/place/district')->with('districts', $districts);
	}
}
