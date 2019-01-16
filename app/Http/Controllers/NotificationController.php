<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;
use App\Models\Notification;


class NotificationController extends Controller
{
	public function list()
	{
		$user = Auth::user();
		$notifications = Notification::where('user_first', $user->id)->orderBy('created_at', 'DESC')->get();
		
		return view('notification')
		->with('menu', 'notification')
		->with('notifications', $notifications );
	}
}