<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use Response;

class PlaceController extends Controller{
	function regencyAjax($province_id){
		$regency = Regency::where('province_id', $province_id)->get();
		return ["data" => $regency];
	}

	function districtAjax($regency_id)
	{
		$district = District::where('regency_id', $regency_id)->get();
		return ["data" => $district];
	}	
}