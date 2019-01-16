<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
	public function province()
    {
        return $this->hasOne(Province::class, 'id', 'province_id');
    }

    public function regency()
    {
        return $this->hasOne(Regency::class, 'id', 'regency_id');
    }
}