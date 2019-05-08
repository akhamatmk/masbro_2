<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\EducationUser;
use App\Models\Experience;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Tribe;
use App\Models\CategoryJobs;
use App\Models\FilterUserValue;
use App\Models\FilterUser;
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

		$religion = ['Silahkan Pilih', 'Islam', 'Kristen Protestan', 'Katolik', 'Hindu', 'Buddha', 'Kong Hu Cu'];

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
		$jobs = CategoryJobs::where('name', 'like', '%'.$text.'%')->Orwhere('meta_search', 'like', '%'.$text.'%')->limit(10)->get();
		return response()->json($jobs);
	}

	public function ajax_search_people(Request $request)
	{
		$keyword = strtolower($request->keyword);
		$region = strtolower($request->region);
		$religion = $request->religion;
		$tribe = isset($request->tribe) ? $request->tribe : null;
		$gender = isset($request->gender) ? $request->gender : null;
		$categoryJobs = CategoryJobs::select('name')		
		->where('name', 'like', '%'.$keyword.'%')
		->orWhere('meta_search', 'like', '%'.$keyword.'%')
		->get();

		$regency = Regency::where('name', 'like', '%'.$region.'%')->get();

		$job = [];
		foreach ($categoryJobs as $key => $value) {
			$job[] = $value->name;
		}

		$r = [];
		foreach ($regency as $key => $value) {
			$r[] = $value->id;
		}

		$user = User::select('users.*')
				->whereIn('users.regency_id', $r)
				->leftJoin('profesional_titles', 'users.id', '=', 'profesional_titles.user_id')
				->whereIn('profesional_titles.title', $job);
		
		if(isset($gender) && count($gender) > 0)
			$user->whereIn('users.gender', $gender);

		if($religion != 0)
			$user->where('users.religion', $religion);

		if(isset($tribe) && strlen($tribe) > 0)
			$user->where('users.tribe', $tribe);

		$result = $user->get();
    	$html = view('ajax_search_people')->with(['users' => $result])->render();
        return response()->json(['html' => $html]);
	}

	public function people_job(Request $request)
	{
		$keyword = strtolower($request->keyword);
		$region = strtolower($request->region);
		$religion = ['Silahkan Pilih', 'Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Kong Hu Cu'];
		$categoryJobs = CategoryJobs::select('name')		
		->where('name', 'like', '%'.$keyword.'%')
		->orWhere('meta_search', 'like', '%'.$keyword.'%')
		->get();

		$regency = Regency::where('name', 'like', '%'.$region.'%')->get();

		$job = [];
		foreach ($categoryJobs as $key => $value) {
			$job[] = $value->name;
		}

		$r = [];
		foreach ($regency as $key => $value) {
			$r[] = $value->id;
		}

		$user = User::select('users.*')
				->whereIn('users.regency_id', $r)
				->leftJoin('profesional_titles', 'users.id', '=', 'profesional_titles.user_id')
				->whereIn('profesional_titles.title', $job)
				->get();

		return view('search_user')->with('users', $user)->with('religion', $religion)->with('region', $region)->with('keyword', $keyword);
	}

	public function profile_edit()
	{
		$user = Auth::user();
		$profesionalTitle = profesionalTitle::where('user_id', $user->id)->get();
		$province = Province::get();
		$regency = Regency::where('province_id', $user->province_id)->get();
		$district = District::where('regency_id', $user->regency_id)->get();
		$filters = FilterUserValue::where('user_id', $user->id)->get();
		$parent_filters = FilterUser::where('parent_id', 0)->get();
		$religion = ['Silahkan Pilih', 'Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Kong Hu Cu'];

		return view('user/edit_profile')
			->with('user', $user)
			->with('provinces', $province)
			->with('regencys', $regency)
			->with('titles', $profesionalTitle)
			->with('menu', 'profile')
			->with('parent_filters', $parent_filters)
			->with('filters', $filters)
			->with('religion', $religion)
			->with('districts', $district);
	}

	public function save_edit(Request $request)
	{		
		$gender = isset($request->gender) ? $request->gender : 0;
		$user = Auth::user();
		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		//$user->user_id = $request->user_id;
		$user->profession = $request->profession;
		$user->bio = $request->bio;
		$user->gender = $request->gender;
		$user->province_id = $request->province_id;
		$user->phone = $request->phone;
		$user->regency_id = $request->regency_id;
		$user->district_id = $request->district_id;
		$user->addreess = $request->addreess;
		$user->longitude = $request->long;
		$user->latitude = $request->lat;
		$user->religion = $request->religion;
		$user->tribe = $request->tribe;
		$user->save();

		$tribe = Tribe::where(DB::raw('upper(name)'),  strtolower($request->tribe))->first();
		if(! $tribe)
		{
			$tribe = new Tribe;
			$tribe->name = strtolower($request->tribe);
			$tribe->save();
		}

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
		
		DB::table('filter_user_values')->where('user_id', $user->id)->delete();

		$user_filter = $request->parent_filter_user;
		if(isset($user_filter) AND count($user_filter) > 0)
		{
			foreach ($user_filter as $key => $value) {
				$FilterUserValue = new FilterUserValue;
				$FilterUserValue->user_id = $user->id;
				$FilterUserValue->filter_1 = $value;
				$FilterUserValue->filter_2 = $request->filter_2[$key];
				$FilterUserValue->filter_3 = isset($_GET['filter_2'][$key]) ? $_GET['filter_2'][$key] : 0;
				$FilterUserValue->save();
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