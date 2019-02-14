<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilterUser;
use Auth;
use App\Models\PostComment;
use App\Models\PostLike;

class CommentController extends Controller
{
	public function insert(Request $request)
	{
		$PostComment = new PostComment;
		$PostComment->text = $request->text;
		$PostComment->user_id = Auth::user()->id;
		$PostComment->post_id = $request->post_id;
		$PostComment->save();
		
		$PostComment = PostComment::with('user')->where('id', $PostComment->id)->first();

		return $PostComment;
	}

	public function like(Request $request)
	{
		$PostLike = PostLike::where('post_id', $request->post_id)->where('user_id', Auth::user()->id)->first();
		
		if(! $PostLike)
		{
			$PostLike = new PostLike;
			$PostLike->user_id = Auth::user()->id;
			$PostLike->post_id = $request->post_id;
			$PostLike->type = 1;
			$PostLike->save();
			return $PostLike->type;
			
		}else {
			if($PostLike->type == 1 )
				$PostLike->type = 0;
			else
				$PostLike->type = 1;
		}

		$PostLike->save();
		return $PostLike->type;
	}
}