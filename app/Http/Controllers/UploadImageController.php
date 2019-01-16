<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class UploadImageController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| UploadImageController Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	public function gallery(Request $request)
	{

		$uploadedFile = $request->file('image');
      	$filename = time().$uploadedFile->getClientOriginalName();

      	Storage::disk('local')->putFileAs(
	        'public/gallery',
	        $uploadedFile,
	        $filename
      	);

		return $filename;
	}
}