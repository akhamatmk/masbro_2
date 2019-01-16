<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\EducationUser;
use App\Models\Experience;
use App\Models\UserDocument;
use App\Models\RelationConnect;
use App\Models\RelationFollow;


class UserController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| User Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	public function profile($id)
	{		
		$user = User::find($id);
		if(! $user)
			return redirect('/');

		$u = Auth::user();
		$connect = 0;
		$follow = 0;

		if($u != null)
		{
			$getData = RelationConnect::where(function($q) use($user, $u){
				$q->where('user_first', $user->id)
				->Where('user_second', $u->id);
			})
			->Orwhere(function($q) use($user, $u){
				$q->where('user_first', $u->id)
				->Where('user_second', $user->id);
			})
	      	->first();

	      	if($getData)
	      		$connect = 1;

	      	$getFollow = RelationFollow::where('user_first', $u->id)->where('user_second', $user->id)->first();
	      	if($getFollow)
	      		$follow = $getFollow->status;
		}

		$education = EducationUser::where('user_id', $user->id)->get();
		$experiences = Experience::where('user_id', $user->id)->get();
		$userDocuments = UserDocument::where('user_id', $user->id)->get();
		$month = ['', 'January', 'February', 'Maret', 'April', 'Mei', 'Juni', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

		return view('user/other_profile')
		->with('user', $user )
		->with('userLogin', $u )
		->with('educations', $education )
		->with('userDocuments', $userDocuments )
		->with('month', $month )
		->with('menu', 'profile')
		->with('connect', $connect)
		->with('follow', $follow)
		->with('experiences', $experiences );
	}
}