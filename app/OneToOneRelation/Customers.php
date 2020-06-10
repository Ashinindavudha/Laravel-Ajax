<?php

namespace App\OneToOneRelation;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $guarded = [];
    public function company()
    {
    	return $this->belongsTo(\App\OneToOneRelation\Company::class);
    }
}
