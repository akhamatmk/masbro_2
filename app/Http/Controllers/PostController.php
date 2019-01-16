<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\GalleryName;
use Session;
use Auth;

class PostController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| PostController Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	public function store(Request $request)
	{
		$post = new Post;
		$post->post = $request->post;
		$post->user_id = Auth::user()->id;
		$post->save();		

		$images = $request->product_images;
		if(isset($images))
		{
			$galleryName = new GalleryName();
			$galleryName->save();

			foreach ($request->product_images as $key => $value) {
				if(isset($value) AND $value != "")
				{
					$gallery = new Gallery;
					$gallery->user_id = Auth::user()->id;
					$gallery->gallery_name_id = $galleryName->id;
					$gallery->post_id = $post->id;
					$gallery->image = $value;
					$gallery->folder = $request->name_folder;
					$gallery->save();
				}
			}	
		}
		
		Session::flash('succes', 'Succes Create Post'); 
		return redirect('profile/user');
	}
}