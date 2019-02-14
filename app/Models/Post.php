<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
	Public function gallery()
	{
		return $this->hasMany(Gallery::class, 'post_id', 'id');
	}

	Public function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}

	Public function comment()
	{
		return $this->hasMany(PostComment::class, 'post_id', 'id');
	}
}