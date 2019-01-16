<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Experience;
use App\Models\UserDocument;
use App\Models\Province;
use Illuminate\Support\Facades\File;
use Session;

class ExperienceController extends Controller
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
		$month = ['', 'January', 'February', 'Maret', 'April', 'Mei', 'Juni', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
		$province = Province::get();
		return view('user/create_experience')
		->with('provinces', $province)
		->with('months', $month)
		->with('user', Auth::user());
	}

	public function store(Request $request)
	{

		$currently = $request->currently;
  		$experience = new Experience;
  		$experience->user_id = Auth::user()->id;
  		$experience->province_id = $request->province_id;
  		$experience->regency_id = $request->regency_id;
  		$experience->title = $request->title;
  		$experience->company = $request->company;
  		$experience->from_year = $request->from_year;
  		$experience->from_month = $request->from_month;
  		$experience->until_year = $request->until_year;
  		$experience->until_month = $request->until_month;
  		$experience->description = $request->description;
  		if(! isset($currently))
  			$experience->description = 0;

	  	$experience->save();
		
		Session::flash('message-succes', 'Succes Save Data'); 
        return redirect('experience/create');
	}

	public function edit($id)
	{
		$experience = Experience::where('id', $id)->where('user_id', Auth::user()->id)->first();
		if(! $experience)
			return redirect('/');

		$month = ['', 'January', 'February', 'Maret', 'April', 'Mei', 'Juni', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
		$province = Province::get();
		return view('user/edit_experience')
		->with('data', $experience)
		->with('provinces', $province)
		->with('months', $month)
		->with('user', Auth::user());
	}

	public function save_edit($id, Request $request)
	{
		$experience = Experience::where('id', $id)->where('user_id', Auth::user()->id)->first();
		if(! $experience)
			return redirect('/');

		$experience->user_id = Auth::user()->id;
  		$experience->province_id = $request->province_id;
  		$experience->regency_id = $request->regency_id;
  		$experience->title = $request->title;
  		$experience->company = $request->company;
  		$experience->from_year = $request->from_year;
  		$experience->from_month = $request->from_month;
  		$experience->until_year = $request->until_year;
  		$experience->until_month = $request->until_month;
  		$experience->description = $request->description;
  		if(! isset($currently))
  			$experience->description = 0;

	  	$experience->save();
		
		Session::flash('message-succes', 'Succes Update Data'); 
        return redirect('experience/create');
	}

	public function delete($id)
	{
		$experience = Experience::where('id', $id)->where('user_id', Auth::user()->id)->first();
		if(! $experience)
			return redirect('/');

		$experience->delete();

		Session::flash('message-succes', 'Succes Delete'); 
        return redirect('experience/create');
	}

	public function upload_document(Request $request)
	{

		$UserDocument = new UserDocument;
		$UserDocument->user_id = Auth::user()->id;
		$UserDocument->keterangan = $request->keterangan;
		if ($request->hasFile('doc'))
        {
            $name = time()."-".str_replace(" ", "", $request->file('doc')->getClientOriginalName());
            $request->doc->move(public_path('/document/user'), $name);
            $UserDocument->type_file = $request->file('doc')->getClientMimeType();
            $UserDocument->name_file = $name;
            $UserDocument->save();
        }

        return response()->json(['succes' => 1]);
	}
}
