<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterUser extends Model
{
	public function children(){
	  return $this->hasMany( 'App\Models\FilterUser', 'parent_id', 'id' );
	}

	public function parent(){
	  return $this->hasOne( 'App\Models\FilterUser', 'id', 'parent_id' );
	}
}