<?php

namespace App\OneToOneRelation;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];
    public function customer()
    {
    	return $this->hasOne(\App\OneToOneRelation\Customers::class);
    }
}
