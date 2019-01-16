<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryJobs extends Model
{
	public function parent()
	{
		return $this->hasOne(CategoryParentJob::class, 'id', 'category_parent_job_id');
	}
}