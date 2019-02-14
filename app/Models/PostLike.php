<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class PostLike extends Model
{
	Public function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}
}