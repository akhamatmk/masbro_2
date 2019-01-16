<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\EducationUser;
use App\Models\Experience;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\CategoryJobs;
use Illuminate\Support\Facades\File;
use App\Models\UserDocument;
use App\Models\ProfesionalTitle;
use App\Models\TitleJob;
use Session;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Register Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	protected function profile()
	{		
		$user = Auth::user();
		$education = EducationUser::where('user_id', $user->id)->orderBy('from', 'ASC')->get();
		$experiences = Experience::where('user_id', $user->id)->orderBy('from_year', 'ASC')->get();
		$userDocuments = UserDocument::where('user_id', $user->id)->get();
		$posts = Post::where('user_id', $user->id)->with('gallery')->orderBy('created_at', 'DESC')->get();
		$month = ['', 'January', 'February', 'Maret', 'April', 'Mei', 'Juni', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
		$gallery = Gallery::where('user_id', $user->id)->limit(12)->get();

		return view('user/profile')
		->with('user', $user )
		->with('educations', $education )
		->with('userDocuments', $userDocuments )
		->with('month', $month )
		->with('menu', 'profile')
		->with('posts', $posts)
		->with('gallery', $gallery)
		->with('experiences', $experiences );
	}

	public function title(Request $request)
	{
		$text = strtolower($request->text);
		$jobs = CategoryJobs::where('name', 'like', '%'.$text.'%')->limit(10)->get();
		return response()->json($jobs);
	}

	public function profile_edit()
	{
		$user = Auth::user();
		$profesionalTitle = profesionalTitle::where('user_id', $user->id)->get();
		$province = Province::get();
		$regency = Regency::where('province_id', $user->province_id)->get();
		$district = District::where('regency_id', $user->regency_id)->get();
		return view('user/edit_profile')
			->with('user', $user)
			->with('provinces', $province)
			->with('regencys', $regency)
			->with('titles', $profesionalTitle)
			->with('menu', 'profile')
			->with('districts', $district);
	}

	public function save_edit(Request $request)
	{
		$user = Auth::user();
		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->user_id = $request->user_id;
		$user->profession = $request->profession;
		$user->bio = $request->bio;
		$user->province_id = $request->province_id;
		$user->phone = $request->phone;
		$user->regency_id = $request->regency_id;
		$user->district_id = $request->district_id;
		$user->addreess = $request->addreess;
		$user->longitude = $request->long;
		$user->latitude = $request->lat;
		$user->save();


		DB::table('profesional_titles')->where('user_id', $user->id)->delete();
		foreach ($request->title as $key => $value) {
			$profesionalTitle = new ProfesionalTitle;
			$profesionalTitle->user_id = $user->id;
			$profesionalTitle->title = $value;

			$s = trim($request->show_hidden[$key], " ");
			if($s == "on")
				$show = 1;
			else
				$show = 0;

			$profesionalTitle->show = $show;

			if($value == $request->primary)
				$primary = 1;
			else
				$primary = 0;

			$profesionalTitle->primary = $primary;
			$profesionalTitle->save();

			$TitleJob = TitleJob::where('name', 'like', '%'.$value.'%')->first();
			if(! $TitleJob)
			{
				$TitleJob = new TitleJob;
				$TitleJob->name = $value;
				$TitleJob->save();
			}
		}

		if ($request->hasFile('profile_image'))
        {
            $image_name = time()."-".str_replace(" ", "", $request->file('profile_image')->getClientOriginalName());
            $request->profile_image->move(public_path('/images/profile-picture-user'), $image_name);
            $user->profile_image = $image_name;
            $user->save();
        }

        Session::flash('message-succes', 'Succes Save Data'); 
        return redirect('profile/user/edit');
	}

	public function set_new_password()
	{
		return view('user/set_new_password');		
	}

	public function save_new_password(Request $request)
	{
		$user = Auth::user();
		$user->password = $request->password;
		$user->save();
		return redirect('home');
	}
}