<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\EducationUser;
use App\Models\School;
use Session;

class EducationController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Education Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	public function create()
	{
		return view('user/create_education')->with('menu', 'profile')->with('user', Auth::user());
	}

	public function store(Request $request)
	{
		$educationUser = new EducationUser;
		$educationUser->user_id = Auth::user()->id;
		$educationUser->school = $request->school;
		$educationUser->degree = $request->degree;
		$educationUser->field_of_study = $request->field_of_study;
		$educationUser->until = $request->until;
		$educationUser->from = $request->from;
		$educationUser->save();

		$school = School::where('name', 'like', '%'.$request->school.'%')->first();
		if(! $school)
		{
			$school = new School;
			$school->name = $request->school;
			$school->save();
		}
		
		Session::flash('message-succes', 'Succes Save Data'); 
        return redirect('education/create');
	}

	public function put($id)
	{
		$educationUser = EducationUser::where('id', $id)->where('user_id', Auth::user()->id)->first();
		if(! $educationUser)
			return redirect('/');

		return view('user/edit_education')->with('menu', 'profile')->with('data', $educationUser)->with('user', Auth::user());
	}
	
	public function putStore($id, Request $request)
	{
		$educationUser = EducationUser::where('id', $id)->where('user_id', Auth::user()->id)->first();
		$educationUser->user_id = Auth::user()->id;
		if(! $educationUser)
			return redirect('/');
		$educationUser->school = $request->school;
		$educationUser->degree = $request->degree;
		$educationUser->field_of_study = $request->field_of_study;
		$educationUser->until = $request->until;
		$educationUser->from = $request->from;
		$educationUser->save();

		$school = School::where('name', 'like', '%'.$request->school.'%')->first();
		if(! $school)
		{
			$school = new School;
			$school->name = $request->school;
			$school->save();
		}
		
		Session::flash('message-succes', 'Succes Save Data'); 
        return redirect('education/create');
	}

	public function delete($id)
	{
		$educationUser = EducationUser::where('id', $id)->where('user_id', Auth::user()->id)->first();
		if(! $educationUser)
			return redirect('/');

		$educationUser->delete();

		Session::flash('message-succes', 'Succes Delete'); 
        return redirect('education/create');
	}

	public function school(Request $request)
	{
		$text = strtolower($request->text);
		$school = School::where('name', 'like', '%'.$text.'%')->limit(10)->get();
		return response()->json($school);
	}
}
