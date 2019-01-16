<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;
use App\Models\RelationConnect;
use App\Models\RelationFollow;
use App\Models\Notification;


class RelationshipController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Search Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	public function connect(Request $request)
	{
		$user_target = $request->user_target;
		$user = Auth::user();

		if($user_target == $user->id)
			return response()->json(['error' => 1]);

		$userTarget = User::find($user_target);
		if(!$userTarget)
			return response()->json(['error' => 1]);

		$relation = RelationConnect::where('user_first', $user->id)->where('user_second', $user_target)->first();

		if(! $relation)
		{
			$relation = new RelationConnect;
			$relation->user_first = $user->id;
			$relation->user_second = $user_target;			
		}

		$relation->save();

		$follow = RelationFollow::where('user_first', $user->id)->where('user_second', $user_target)->first();
		if($follow)
			$follow->status = 1;
		else
		{
			$follow = new RelationFollow;
			$follow->user_first = $user->id;
			$follow->user_second = $user_target;
			$follow->status = 1;
		}
		$follow->save();

		
		$notification = new Notification;
		$notification->user_first = $user_target;
		$notification->user_second = $user->id;
		$notification->type = 1;
		$notification->save();
		
		return response()->json(['error' => 0, 'follow' => $follow->status]);
	}

	public function follow(Request $request)
	{
		$user_target = $request->user_target;
		$user = Auth::user();

		$follow = RelationFollow::where('user_first', $user->id)->where('user_second', $user_target)->first();
		
		if($follow){
			if($follow->status == 1)
				$follow->status = 0;
			else
				$follow->status = 1;
		}
		else
		{
			$follow = new RelationFollow;
			$follow->user_first = $user->id;
			$follow->user_second = $user_target;
			$follow->status = 1;
		}
		$follow->save();

		if($follow->status == 1)
		{
			$notification = new Notification;
			$notification->user_first = $user_target;
			$notification->user_second = $user->id;
			$notification->type = 2;
			$notification->save();	
		}
		
		return response()->json(['error' => 0, 'follow' => $follow->status]);
	}

	public function confirmConnect($id)
	{
		$user = Auth::user();
		$notif = Notification::where('type', 1)->where('user_first', $user->id)->where('id', $id)->first();
		if(! $notif)
			return redirect('/');
		
		$relation = RelationConnect::where('user_first', $notif->user_second)->where('user_second', $user->id)->first();
		
		if(! $relation)
			return redirect('/');

		if($relation->status == 1)
			return redirect('user/profile/'.$notif->user_second);

		return view('confirm_connect')
		->with('notification', $notif );
	}

	public function confirmConnectSubmit($id, Request $request)
	{
		$user = Auth::user();
		$notif = Notification::where('type', 1)->where('user_first', $user->id)->where('id', $id)->first();
		if(! $notif)
			return redirect('/');
		
		$relation = RelationConnect::where('user_first', $notif->user_second)->where('user_second', $user->id)->first();
		
		if(! $relation)
			return redirect('/');

		if($request->type == 1)
		{
			$relation->status = 1;
			$relation->save();

			$notification = new Notification;
			$notification->user_first = $notif->user_second;
			$notification->user_second = $user->id;
			$notification->type = 3;
			$notification->save();	
			return redirect('user/profile/'.$notif->user_second);
		}

		$relation->delete();	
		$notif->delete();
		return redirect('/');
	}
}