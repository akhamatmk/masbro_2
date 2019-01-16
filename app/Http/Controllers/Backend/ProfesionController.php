<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryParentJob;
use App\Models\CategoryJobs;
use Session;
use Auth;

class ProfesionController extends Controller
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

	public function parent()
	{
		$categorys = CategoryParentJob::get();
		return view('backend/profesion/parent')->with('user', Auth::user())->with('categorys', $categorys);
	}

	public function parent_add()
	{
		return view('backend/profesion/create_parent');	
	}

	public function parent_add_store(Request $request)
	{
		$CategoryParentJob = new CategoryParentJob;
		$CategoryParentJob->name = $request->name;
		$CategoryParentJob->meta_search = $request->meta_search;
		$CategoryParentJob->save();

		Session::flash('message-succes', 'Data Succes Add');
      	return redirect('backend/admin/profesion/parent');
	}

	public function parent_add_edit($id)
	{
		$CategoryParentJob = CategoryParentJob::find($id);
		if(! $CategoryParentJob)
			return redirect('backend/admin/profesion/parent');

		return view('backend/profesion/edit_parent')->with('data', $CategoryParentJob);	
	}

	public function parent_add_edit_save($id, Request $request)
	{
		$CategoryParentJob = CategoryParentJob::find($id);
		if(! $CategoryParentJob)
			return redirect('backend/admin/profesion/parent');

		$CategoryParentJob->meta_search = $request->meta_search;
		$CategoryParentJob->save();

		Session::flash('message-succes', 'Data Succes Edit');
      	return redirect('backend/admin/profesion/parent/edit/'.$id);
	}

	public function parent_delete($id)
	{
		$CategoryParentJob = CategoryParentJob::find($id);
		if(! $CategoryParentJob)
			return redirect('backend/admin/profesion/parent');
		
		$CategoryJobs = CategoryJobs::where('category_parent_job_id', $id)->get();

		if(count($CategoryJobs) == 0)
		{
			$CategoryParentJob->delete();
			Session::flash('message-succes', 'Data Succes Delete');
		} else
			Session::flash('message-error', 'Masih mempunyai data child');

      	return redirect('backend/admin/profesion/parent');
	}

	public function child()
	{
		$categorys = CategoryJobs::with(['parent'])->get();
		return view('backend/profesion/child')->with('categorys', $categorys);
	}

	public function child_add()
	{
		$CategoryParentJob = CategoryParentJob::get();
		return view('backend/profesion/create_child')->with('parent', $CategoryParentJob);	
	}

	public function child_add_store(Request $request)
	{
		$CategoryJobs = new CategoryJobs;
		$CategoryJobs->name = $request->name;
		$CategoryJobs->category_parent_job_id = $request->parent_id;
		$CategoryJobs->meta_search = $request->meta_search;
		$CategoryJobs->save();

		Session::flash('message-succes', 'Data Succes Add');
      	return redirect('backend/admin/profesion/child');		
	}

	public function child_add_edit($id)
	{
		$CategoryJobs = CategoryJobs::find($id);
		if(! $CategoryJobs)
			return redirect('backend/admin/profesion/child');

		$CategoryParentJob = CategoryParentJob::get();
		return view('backend/profesion/edit_child')->with('data', $CategoryJobs)->with('parent', $CategoryParentJob);
	}

	Public function child_add_edit_save($id, Request $request)
	{
		$CategoryJobs = CategoryJobs::find($id);
		if(! $CategoryJobs)
			return redirect('backend/admin/profesion/child');		

		$CategoryJobs->name = $request->name;
		$CategoryJobs->category_parent_job_id = $request->parent_id;
		$CategoryJobs->meta_search = $request->meta_search;
		$CategoryJobs->save();

		Session::flash('message-succes', 'Data Succes edit');
      	return redirect('backend/admin/profesion/child');
	}

	public function child_delete ($id)
	{
		$CategoryJobs = CategoryJobs::find($id)->delete();
		Session::flash('message-succes', 'Data Succes Delete');
		return redirect('backend/admin/profesion/child');
	}
}
