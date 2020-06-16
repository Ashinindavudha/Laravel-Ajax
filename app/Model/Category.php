<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'detail'];

    public function products()
{
    return $this->belongsToMany(Product::class);
}

}
