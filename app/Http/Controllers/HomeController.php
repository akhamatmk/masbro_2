<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPosting;
use App\Models\CategoryJobs;
use App\Models\Province;
use App\Models\Regency;
use Session;

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
		$types = ["Silahkan Pilih", "Freelance", "Full Time", "Internship", "Part Time", "Temporary", "Internship", "Part Time", "Temporary", "Freelance", "Full Time"];

		$jobs = JobPosting::get();
		$category = CategoryJobs::get();
		$province = Province::get();
		$regencys = Regency::where('province_id', 31)->get();

		return view('welcome')
		->with('jobs', $jobs)
		->with('categorys', $category)
		->with('provinces', $province)
		->with('regencys', $regencys)
		->with('menu', 'home')
		->with('type', $types);
	}
}