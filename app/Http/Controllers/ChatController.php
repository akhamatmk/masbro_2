<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Group;
use App\User;
use App\Conversation;
use App\GroupUser;
use App\Models\EducationUser;

class ChatController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index(Request $request)
	{
        $groups = Group::with('conversations', 'conversations.user')->get();
        $users = User::where('id', '<>', auth()->user()->id)->get();
        $user = auth()->user();

        return view('chat', ['groups' => $groups, 'users' => $users, 'user' => $user]);
	}

    public function check_school(Request $request)
    {
        $school = isset($request->school) ? $request->school : null;
        if($school == null)
            return redirect('/');

        $user = Auth::user();
        $educationUser = EducationUser::where('user_id', $user->id)->where('school', $school)->first();
        if($educationUser == null)
            return redirect('/');
        
        $group = Group::where('name', $school)->first();
        if(! $group)
        {            
            $user_group = [];
            $educationUser = EducationUser::select('user_id')->where('school', $school)->get();
            if($educationUser)
            {
                foreach ($educationUser as $key => $value) {
                    $user_group[] = $value->user_id;
                }

                $group = Group::create(['name' => $school]);
                $users = collect($user_group);
                $group->users()->attach($users);
            }            
        }

        return redirect('chat/group/'.$group->id);
    }

    public function group($group_id)
    {
        $groups = Group::with('conversations', 'conversations.user')->where('id', $group_id)->get();
        if(count($groups) == 0)
            return redirect('/');

        $users = User::where('id', '<>', auth()->user()->id)->get();
        $users_other = GroupUser::where('group_id', $group_id)->with('user')->get();
        $user = auth()->user();

        return view('chat_group', ['groups' => $groups, 'users' => $users, 'user' => $user, 'list_user' => $users_other]);
    }
}