<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryJobs;
use App\Models\CategoryParentJob;
use App\Models\Province;
use App\Models\Regency;
use App\Models\JobPosting;
use Auth;
use Session;

class JobController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Job Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	public function create()
	{
		$types = ["Silahkan Pilih", "Freelance", "Full Time", "Internship", "Part Time", "Temporary", "Internship", "Part Time", "Temporary", "Freelance", "Full Time"];
		$province = Province::get();
		$categoryParentJob = CategoryParentJob::get();
		return view('user/create_job')
		->with('provinces', $province)
		->with('categoryParents', $categoryParentJob)
		->with('types', $types);
	}

	public function child_category($parent_id)
	{
		$categoryJobs = CategoryJobs::where('category_parent_job_id', $parent_id)->get();
		return $categoryJobs;
	}

	public function store(Request $request)
	{
		$user = Auth::user();

		$jobPosting = new JobPosting;
		$jobPosting->title = $request->title;
		$jobPosting->user_id = $user->id;
		$jobPosting->category_job_id = $request->category_job_id;
		$jobPosting->type_jobs = $request->type_jobs;
		$jobPosting->job_description = $request->job_description;
		$jobPosting->how_to_apply = $request->how_to_apply;
		$jobPosting->job_requirements = $request->job_requirements;
		$jobPosting->sallary = $request->sallary;
		$jobPosting->type_payment = $request->type_payment;
		$jobPosting->experience = $request->experience;
		$jobPosting->deadline_jobs = $request->deadline_jobs;
		$jobPosting->provincy_id = $request->province_id;
		$jobPosting->regency_id = $request->regency_id;
		$jobPosting->detail_address = $request->addreess;
		$jobPosting->longitude = $request->long;
		$jobPosting->latitude = $request->lat;
		$jobPosting->save();
	
		Session::flash('message-succes', 'Succes Save Data'); 
        return redirect('job/create');
	}

	public function list_job_all()
	{
		$job = JobPosting::select("*");
		$types = ["Silahkan Pilih", "Freelance", "Full Time", "Internship", "Part Time", "Temporary", "Internship", "Part Time", "Temporary", "Freelance", "Full Time"];

		$provinces = Province::get();

		if(isset($_GET['province']) AND $_GET['province'] !== "all")
		{
			$province = Province::where('name', str_replace("+", " ", $_GET['province']))->first();
			if($province)
				$job->where('provincy_id', $province->id);
			else
				$job->where('provincy_id', 0);
		}

		if(isset($_GET['category']) AND $_GET['category'] !== "all")
		{
			$category = CategoryJobs::where('name', str_replace("+", " ", $_GET['category']))->first();
			if($category)
				$job->where('category_job_id', $category->id);
			else
				$job->where('category_job_id', 0);
		}

		if(isset($_GET['keyword']) AND $_GET['keyword'] !== "all" AND strlen($_GET['keyword']) > 0)
		{
			$job->where('title', 'like', '%' . $_GET['keyword'] . '%');
		}

		
		return view('user/list_job_all')
		->with('type', $types)
		->with('jobs', $job->get())
		->with('provinces', $provinces);
	}

	public function detail_job($id)
	{
		$job = JobPosting::find($id);
		return view('user/detail_job')
		->with('job', $job);
	}

	public function list_job_ajax(Request $request)
	{
		$job = JobPosting::select('*');
		$types = ["Silahkan Pilih", "Freelance", "Full Time", "Internship", "Part Time", "Temporary", "Internship", "Part Time", "Temporary", "Freelance", "Full Time"];
		if(isset($_GET['province']) AND $_GET['province'] !== "all")
		{
			$province = Province::where('name', $_GET['province'])->first();
			if($province)
				$job->where('provincy_id', $province->id);
			else
				$job->where('provincy_id', 0);
		}

		if(isset($_GET['regency']) AND $_GET['regency'] !== "all")
		{
			$regency = Regency::where('name', $_GET['regency'])->first();
			if($regency)
				$job->where('regency_id', $regency->id);
			else
				$job->where('regency_id', 0);
		}

    	$job_content = view('user/list_job_ajax')
						->with('type', $types)
						->with('jobs', $job->get())
						->render();
                	
    	return response()->json(['job_content' => $job_content]);
	}
}
