<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
	public function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}

	public function provincy()
	{
		return $this->hasOne(Province::class, 'id', 'provincy_id');
	}

	public function regency()
	{
		return $this->hasOne(Regency::class, 'id', 'regency_id');
	}
}