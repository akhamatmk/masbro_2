<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	Public function gallery()
	{
		return $this->hasMany(Gallery::class, 'post_id', 'id');
	}
}