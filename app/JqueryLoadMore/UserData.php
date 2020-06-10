<?php

namespace App\JqueryLoadMore;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'user_data';
    protected $fillable = ['name', 'email', 'address'];
    public function getData()
    {
    	return static::orderBy('id')->paginate(15);
    }
}
