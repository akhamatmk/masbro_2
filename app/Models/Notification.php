<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Notification extends Model
{
	public function userF()
	{
		return $this->hasOne(User::class, 'id', 'user_first');
	}

	public function userT()
	{
		return $this->hasOne(User::class, 'id', 'user_second');
	}
}